package repository

import (
	"context"
	"strings"

	"atcoder-wiki-backend/model"

	"github.com/jackc/pgx/v5"
)

// ページリポジトリ
type PageRepository struct {
	Conn *pgx.Conn
}

// ページリポジトリの初期化
func NewPageRepository(conn *pgx.Conn) *PageRepository {
	return &PageRepository{Conn: conn}
}

// ページ一覧取得
func (r *PageRepository) GetAllPages(ctx context.Context) ([]model.Page, error) {
	rows, err := r.Conn.Query(ctx, `
		SELECT id, slug, title, content_md, created_at, updated_at
		FROM pages
		ORDER BY title ASC
	`)
	if err != nil {
		return nil, err
	}
	defer rows.Close()

	pages := make([]model.Page, 0)

	for rows.Next() {
		var p model.Page
		err := rows.Scan(
			&p.ID,
			&p.Slug,
			&p.Title,
			&p.ContentMD,
			&p.CreatedAt,
			&p.UpdatedAt,
		)
		if err != nil {
			return nil, err
		}
		pages = append(pages, p)
	}

	return pages, nil
}

// ページ作成
func (r *PageRepository) CreatePage(
	ctx context.Context,
	slug string,
	title string,
	contentMD string,
) (*model.Page, error) {

	query := `
		INSERT INTO pages (slug, title, content_md)
		VALUES ($1, $2, $3)
		RETURNING id, slug, title, content_md, created_at, updated_at
	`

	var p model.Page

	err := r.Conn.QueryRow(
		ctx,
		query,
		slug,
		title,
		contentMD,
	).Scan(
		&p.ID,
		&p.Slug,
		&p.Title,
		&p.ContentMD,
		&p.CreatedAt,
		&p.UpdatedAt,
	)

	if err != nil {
		return nil, err
	}

	return &p, nil
}

// slugからページ取得（tags込み）
func (r *PageRepository) GetPageBySlug(ctx context.Context, slug string) (*model.Page, error) {
	query := `
		SELECT
			p.id,
			p.slug,
			p.title,
			p.content_md,
			p.created_at,
			p.updated_at,
			COALESCE(
				array_agg(t.name) FILTER (WHERE t.name IS NOT NULL),
				ARRAY[]::text[]
			) AS tags
		FROM pages p
		LEFT JOIN page_tags pt ON pt.page_id = p.id
		LEFT JOIN tags t ON t.id = pt.tag_id
		WHERE p.slug = $1
		GROUP BY
			p.id, p.slug, p.title, p.content_md, p.created_at, p.updated_at
	`

	var p model.Page
	var tags []string

	err := r.Conn.QueryRow(ctx, query, slug).Scan(
		&p.ID,
		&p.Slug,
		&p.Title,
		&p.ContentMD,
		&p.CreatedAt,
		&p.UpdatedAt,
		&tags,
	)
	if err != nil {
		return nil, err
	}

	p.Tags = tags
	return &p, nil
}

// ページ編集（idベースのまま残す）
func (r *PageRepository) UpdatePage(
	ctx context.Context,
	id int,
	title string,
	contentMD string,
) (*model.Page, error) {

	query := `
		UPDATE pages
		SET title = $1,
		    content_md = $2,
		    updated_at = NOW()
		WHERE id = $3
		RETURNING id, slug, title, content_md, created_at, updated_at
	`

	var p model.Page

	err := r.Conn.QueryRow(
		ctx,
		query,
		title,
		contentMD,
		id,
	).Scan(
		&p.ID,
		&p.Slug,
		&p.Title,
		&p.ContentMD,
		&p.CreatedAt,
		&p.UpdatedAt,
	)

	if err != nil {
		return nil, err
	}

	return &p, nil
}

// ページ削除（idベースのまま残す）
func (r *PageRepository) DeletePage(
	ctx context.Context,
	id int,
) error {

	query := `
		DELETE FROM pages
		WHERE id = $1
	`

	cmd, err := r.Conn.Exec(ctx, query, id)
	if err != nil {
		return err
	}

	if cmd.RowsAffected() == 0 {
		return pgx.ErrNoRows
	}

	return nil
}

// tags を全入れ替え
func (r *PageRepository) ReplaceTags(ctx context.Context, pageID int, tags []string) error {
	uniq := make([]string, 0, len(tags))
	seen := map[string]struct{}{}
	for _, t := range tags {
		s := strings.TrimSpace(t)
		if s == "" {
			continue
		}
		if _, ok := seen[s]; ok {
			continue
		}
		seen[s] = struct{}{}
		uniq = append(uniq, s)
	}

	tx, err := r.Conn.Begin(ctx)
	if err != nil {
		return err
	}
	defer func() { _ = tx.Rollback(ctx) }()

	if _, err := tx.Exec(ctx, `DELETE FROM page_tags WHERE page_id = $1`, pageID); err != nil {
		return err
	}

	if len(uniq) == 0 {
		return tx.Commit(ctx)
	}

	for _, name := range uniq {
		var tagID int
		err := tx.QueryRow(ctx, `
			INSERT INTO tags (name)
			VALUES ($1)
			ON CONFLICT (name) DO UPDATE SET name = EXCLUDED.name
			RETURNING id
		`, name).Scan(&tagID)
		if err != nil {
			return err
		}

		if _, err := tx.Exec(ctx, `
			INSERT INTO page_tags (page_id, tag_id)
			VALUES ($1, $2)
			ON CONFLICT DO NOTHING
		`, pageID, tagID); err != nil {
			return err
		}
	}

	return tx.Commit(ctx)
}
