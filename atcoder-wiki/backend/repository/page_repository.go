package repository

import (
	"context"

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
		// rows.Scan() で構造体へ直接格納
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

// slugからページ取得
func (r *PageRepository) GetPageBySlug(ctx context.Context, slug string) (*model.Page, error) {
	query := `
		SELECT id, slug, title, content_md, created_at, updated_at
		FROM pages
		WHERE slug = $1
	`

	var p model.Page

	// QueryRow() 1行だけ取得
	err := r.Conn.QueryRow(ctx, query, slug).Scan(
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

// ページ編集
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

// ページ削除
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
