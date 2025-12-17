package main

import (
	"context"
	"log"
	"net/http"
	"os"
	"time"

	"atcoder-wiki-backend/handler"
	"atcoder-wiki-backend/repository"

	"github.com/gin-contrib/cors"
	"github.com/gin-gonic/gin"
	"github.com/jackc/pgx/v5"
)

func main() {
	dsn := os.Getenv("DATABASE_URL")
	if dsn == "" {
		dsn = "postgres://wikiuser:wikipass@localhost:5432/wiki?sslmode=disable"
	}

	ctx, cancel := context.WithTimeout(context.Background(), 10*time.Second)
	defer cancel()

	conn, err := pgx.Connect(ctx, dsn)
	if err != nil {
		log.Fatalf("failed to connect db: %v", err)
	}
	defer conn.Close(context.Background())

	repo := repository.NewPageRepository(conn)
	h := handler.NewPageHandler(repo)

	r := gin.Default()

	r.Use(cors.New(cors.Config{
		AllowOrigins: []string{
			"http://localhost:5173",
		},
		AllowMethods: []string{
			http.MethodGet,
			http.MethodPost,
			http.MethodPut,
			http.MethodDelete,
			http.MethodOptions,
		},
		AllowHeaders: []string{
			"Content-Type",
			"Accept",
		},
		MaxAge: 12 * time.Hour,
	}))

	api := r.Group("/api")
	{
		api.GET("/pages", h.GetAllPages)
		api.POST("/pages", h.CreatePage)

		api.GET("/pages/:slug", h.GetPageBySlug)
		api.PUT("/pages/:slug", h.UpdatePageBySlug)
		api.DELETE("/pages/:slug", h.DeletePageBySlug)
	}

	if err := r.Run(":8080"); err != nil {
		log.Fatal(err)
	}
}
