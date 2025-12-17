package handler

import (
	"context"
	"errors"
	"log"
	"net/http"
	"strings"
	"time"

	"atcoder-wiki-backend/repository"

	"github.com/gin-gonic/gin"
	"github.com/jackc/pgx/v5"
)

type PageHandler struct {
	Repo *repository.PageRepository
}

func NewPageHandler(repo *repository.PageRepository) *PageHandler {
	return &PageHandler{Repo: repo}
}

/* ---------- request ---------- */

type createPageRequest struct {
	Title     string   `json:"title"`
	ContentMD string   `json:"content_md"`
	Tags      []string `json:"tags"`
}

type updatePageRequest struct {
	Title     string   `json:"title"`
	ContentMD string   `json:"content_md"`
	Tags      []string `json:"tags"`
}

/* ---------- handlers ---------- */

func (h *PageHandler) GetAllPages(c *gin.Context) {
	ctx, cancel := context.WithTimeout(c.Request.Context(), 5*time.Second)
	defer cancel()

	pages, err := h.Repo.GetAllPages(ctx)
	if err != nil {
		log.Printf("[GetAllPages] err=%v", err)
		c.JSON(http.StatusInternalServerError, gin.H{"error": "failed to get pages"})
		return
	}
	c.JSON(http.StatusOK, pages)
}

func (h *PageHandler) GetPageBySlug(c *gin.Context) {
	slug := c.Param("slug")

	ctx, cancel := context.WithTimeout(c.Request.Context(), 5*time.Second)
	defer cancel()

	page, err := h.Repo.GetPageBySlug(ctx, slug)
	if err != nil {
		log.Printf("[GetPageBySlug] slug=%s err=%v", slug, err)
		if errors.Is(err, pgx.ErrNoRows) {
			c.JSON(http.StatusNotFound, gin.H{"error": "page not found"})
			return
		}
		c.JSON(http.StatusInternalServerError, gin.H{"error": "failed to get page"})
		return
	}

	c.JSON(http.StatusOK, page)
}

func (h *PageHandler) CreatePage(c *gin.Context) {
	var req createPageRequest
	if err := c.ShouldBindJSON(&req); err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "invalid body"})
		return
	}

	req.Title = strings.TrimSpace(req.Title)
	if req.Title == "" {
		c.JSON(http.StatusBadRequest, gin.H{"error": "title is required"})
		return
	}

	ctx, cancel := context.WithTimeout(c.Request.Context(), 10*time.Second)
	defer cancel()

	slug := generateSlug(req.Title)

	page, err := h.Repo.CreatePage(ctx, slug, req.Title, req.ContentMD)
	if err != nil {
		log.Printf("[CreatePage] insert err=%v", err)
		c.JSON(http.StatusInternalServerError, gin.H{"error": "failed to create page"})
		return
	}

	if err := h.Repo.ReplaceTags(ctx, page.ID, req.Tags); err != nil {
		log.Printf("[CreatePage] ReplaceTags pageID=%d err=%v", page.ID, err)
		c.JSON(http.StatusInternalServerError, gin.H{"error": "failed to save tags"})
		return
	}

	out, err := h.Repo.GetPageBySlug(ctx, slug)
	if err != nil {
		log.Printf("[CreatePage] reload slug=%s err=%v", slug, err)
		c.JSON(http.StatusInternalServerError, gin.H{"error": "failed to load page"})
		return
	}

	c.JSON(http.StatusCreated, out)
}

func (h *PageHandler) UpdatePageBySlug(c *gin.Context) {
	slug := c.Param("slug")

	var req updatePageRequest
	if err := c.ShouldBindJSON(&req); err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"error": "invalid body"})
		return
	}

	req.Title = strings.TrimSpace(req.Title)
	if req.Title == "" {
		c.JSON(http.StatusBadRequest, gin.H{"error": "title is required"})
		return
	}

	ctx, cancel := context.WithTimeout(c.Request.Context(), 10*time.Second)
	defer cancel()

	existing, err := h.Repo.GetPageBySlug(ctx, slug)
	if err != nil {
		log.Printf("[UpdatePageBySlug] load slug=%s err=%v", slug, err)
		if errors.Is(err, pgx.ErrNoRows) {
			c.JSON(http.StatusNotFound, gin.H{"error": "page not found"})
			return
		}
		c.JSON(http.StatusInternalServerError, gin.H{"error": "failed to load page"})
		return
	}

	_, err = h.Repo.UpdatePage(ctx, existing.ID, req.Title, req.ContentMD)
	if err != nil {
		log.Printf("[UpdatePageBySlug] update id=%d err=%v", existing.ID, err)
		c.JSON(http.StatusInternalServerError, gin.H{"error": "failed to update page"})
		return
	}

	if err := h.Repo.ReplaceTags(ctx, existing.ID, req.Tags); err != nil {
		log.Printf("[UpdatePageBySlug] ReplaceTags id=%d err=%v", existing.ID, err)
		c.JSON(http.StatusInternalServerError, gin.H{"error": "failed to update tags"})
		return
	}

	out, err := h.Repo.GetPageBySlug(ctx, slug)
	if err != nil {
		log.Printf("[UpdatePageBySlug] reload slug=%s err=%v", slug, err)
		c.JSON(http.StatusInternalServerError, gin.H{"error": "failed to reload page"})
		return
	}

	c.JSON(http.StatusOK, out)
}

func (h *PageHandler) DeletePageBySlug(c *gin.Context) {
	slug := c.Param("slug")

	ctx, cancel := context.WithTimeout(c.Request.Context(), 10*time.Second)
	defer cancel()

	page, err := h.Repo.GetPageBySlug(ctx, slug)
	if err != nil {
		log.Printf("[DeletePageBySlug] load slug=%s err=%v", slug, err)
		if errors.Is(err, pgx.ErrNoRows) {
			c.JSON(http.StatusNotFound, gin.H{"error": "page not found"})
			return
		}
		c.JSON(http.StatusInternalServerError, gin.H{"error": "failed to load page"})
		return
	}

	if err := h.Repo.DeletePage(ctx, page.ID); err != nil {
		log.Printf("[DeletePageBySlug] delete id=%d err=%v", page.ID, err)
		c.JSON(http.StatusInternalServerError, gin.H{"error": "failed to delete page"})
		return
	}

	c.Status(http.StatusNoContent)
}

/* ---------- util ---------- */

func generateSlug(title string) string {
	s := strings.ToLower(strings.TrimSpace(title))
	s = strings.ReplaceAll(s, " ", "-")
	return s
}
