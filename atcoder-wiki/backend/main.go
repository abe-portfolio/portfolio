package main

import (
	"context"
	"fmt"
	"log"

	// ルーティング
	"atcoder-wiki-backend/handler"
	"atcoder-wiki-backend/logger"
	"atcoder-wiki-backend/middleware"
	"atcoder-wiki-backend/repository"

	"github.com/gin-gonic/gin"
	"github.com/jackc/pgx/v5"
)

func main() {
	logger.Init()

	dsn := "postgres://wikiuser:wikipass@localhost:5432/wiki"
	conn, err := pgx.Connect(context.Background(), dsn)
	if err != nil {
		log.Fatal("DB接続失敗:", err)
	}
	defer conn.Close(context.Background())

	fmt.Println("✅ DB接続完了")

	// Repository & Handler
	pageRepo := repository.NewPageRepository(conn)
	pageHandler := handler.NewPageHandler(pageRepo)

	// gin.Default()だとGinのLoggerが使用されるが、今回は自前のログを使用するため　gin.New()を使用
	// r := gin.Default()
	r := gin.New()

	// ログ・リカバリ
	r.Use(middleware.AccessLogger())
	r.Use(middleware.SecurityLogger())
	r.Use(gin.Recovery())

	// 死活監視
	r.GET("/health", func(c *gin.Context) {
		c.JSON(200, gin.H{"status": "ok"})
	})

	// ページ一覧取得API
	r.GET("/api/pages", pageHandler.GetPages)
	// ページ作成API
	r.POST("/api/pages", pageHandler.CreatePage)
	// slugからページ取得API
	r.GET("/api/pages/:slug", pageHandler.GetPageBySlug)
	// ページ編集API
	r.PUT("/api/pages/:id", pageHandler.UpdatePage)
	// ページ削除API
	r.DELETE("/api/pages/:id", pageHandler.DeletePage)

	fmt.Println("✅ Server起動 : http://localhost:8080")
	r.Run(":8080")
}
