package handler

import (
	"context"
	"net/http"
	"regexp"
	"strconv"
	"strings"

	"atcoder-wiki-backend/logger"
	"atcoder-wiki-backend/repository"

	"github.com/gin-gonic/gin"
)

type PageHandler struct {
	Repo *repository.PageRepository
}

// リクエスト用 DTO
type CreatePageRequest struct {
	Title     string `json:"title"`
	ContentMD string `json:"content_md"`
}

// PUT用 DTO
type UpdatePageRequest struct {
	Title     string `json:"title"`
	ContentMD string `json:"content_md"`
}

// ページハンドラの初期化
func NewPageHandler(repo *repository.PageRepository) *PageHandler {
	return &PageHandler{Repo: repo}
}

// ページ一覧取得
func (h *PageHandler) GetPages(c *gin.Context) {
	pages, err := h.Repo.GetAllPages(context.Background())
	if err != nil {
		c.JSON(http.StatusInternalServerError, gin.H{
			"error": "cannot fetch pages",
		})
		return
	}

	c.JSON(http.StatusOK, pages)
}

// slug生成   slug　：　URL用に安全に加工された「識別子用の文字列」　　（連想配列におけるキーみたいなイメージ）
func generateSlug(title string) string {
	slug := strings.ToLower(title)
	slug = strings.TrimSpace(slug)

	re := regexp.MustCompile(`[^a-z0-9]+`)
	slug = re.ReplaceAllString(slug, "-")
	slug = strings.Trim(slug, "-")

	return slug
}

// ページ作成
func (h *PageHandler) CreatePage(c *gin.Context) {
	var req CreatePageRequest

	if err := c.ShouldBindJSON(&req); err != nil {
		c.JSON(http.StatusBadRequest, gin.H{
			"error": "invalid request body",
		})
		return
	}

	if req.Title == "" || req.ContentMD == "" {
		c.JSON(http.StatusBadRequest, gin.H{
			"error": "title and content_md are required",
		})
		return
	}

	slug := generateSlug(req.Title)

	page, err := h.Repo.CreatePage(
		context.Background(),
		slug,
		req.Title,
		req.ContentMD,
	)
	if err != nil {
		c.JSON(http.StatusInternalServerError, gin.H{
			"error": "failed to create page",
		})
		return
	}

	c.JSON(http.StatusCreated, page)
}

// slugからページ取得
func (h *PageHandler) GetPageBySlug(c *gin.Context) {
	slug := c.Param("slug")

	if slug == "" {
		c.JSON(http.StatusBadRequest, gin.H{
			"error": "slug is required",
		})
		return
	}

	page, err := h.Repo.GetPageBySlug(context.Background(), slug)
	if err != nil {
		c.JSON(http.StatusNotFound, gin.H{
			"error": "page not found",
		})
		return
	}

	c.JSON(http.StatusOK, page)
}

// ページ編集
func (h *PageHandler) UpdatePage(c *gin.Context) {
	idParam := c.Param("id")

	id, err := strconv.Atoi(idParam)
	if err != nil {
		c.JSON(http.StatusBadRequest, gin.H{
			"error": "invalid id",
		})
		return
	}

	var req UpdatePageRequest
	if err := c.ShouldBindJSON(&req); err != nil {
		c.JSON(http.StatusBadRequest, gin.H{
			"error": "invalid request body",
		})
		return
	}

	if req.Title == "" || req.ContentMD == "" {
		c.JSON(http.StatusBadRequest, gin.H{
			"error": "title and content_md are required",
		})
		return
	}

	page, err := h.Repo.UpdatePage(
		context.Background(),
		id,
		req.Title,
		req.ContentMD,
	)

	if err != nil {
		logger.ErrorLogger.Println("Update failed:", err)
		c.JSON(http.StatusNotFound, gin.H{
			"error": "page not found",
		})
		return
	}

	c.JSON(http.StatusOK, page)
}

// ページ削除
func (h *PageHandler) DeletePage(c *gin.Context) {
	idParam := c.Param("id")

	id, err := strconv.Atoi(idParam)
	if err != nil {
		c.JSON(http.StatusBadRequest, gin.H{
			"error": "invalid id",
		})
		return
	}

	err = h.Repo.DeletePage(context.Background(), id)
	if err != nil {
		logger.ErrorLogger.Println("Delete failed:", err)
		c.JSON(http.StatusNotFound, gin.H{
			"error": "page not found",
		})
		return
	}

	c.JSON(http.StatusOK, gin.H{
		"result": "deleted",
	})
}
