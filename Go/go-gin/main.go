package main

import (
	"net/http"

	"github.com/gin-gonic/gin"
)

func main() {
	// Ginのデフォルトのルーターを作成
	router := gin.Default()

	// ルートハンドラーを設定
	router.GET("/", func(c *gin.Context) {
		c.JSON(http.StatusOK, gin.H{
			"message": "Hello, World!",
		})
	})

	// ユーザー情報を取得するハンドラーを設定
	router.GET("/user/:name", func(c *gin.Context) {
		name := c.Param("name")
		c.JSON(http.StatusOK, gin.H{
			"user": name,
		})
	})

	// フォームデータを処理するハンドラーを設定
	router.POST("/form", func(c *gin.Context) {
		message := c.PostForm("message")
		nick := c.DefaultPostForm("nick", "anonymous")
		c.JSON(http.StatusOK, gin.H{
			"status":  "posted",
			"message": message,
			"nick":    nick,
		})
	})

	// サーバーをポート8080で起動（http://localhost:8080/ でアクセス）
	router.Run(":8080")
}

// gin.H　->　JSONレスポンスを簡単に構築するために提供されるショートカット（実際にはマップ型のエイリアス）
/*
	◆シンプルなレスポンス
	c.JSON(http.StatusOK, gin.H{
        "message": "Hello, World!",
	})

	出力：{"message": "Hello, World!"}　をクライアントに返す

    -----------------------------------------------------------------------------------------------

	◆連想的なレスポンス
	c.JSON(http.StatusOK, gin.H{
        "status":  "posted",
        "message": message,
        "nick":    nick,
	})

	出力：{"status": "posted", "message": "some message", "nick": "some nick"}

*/
