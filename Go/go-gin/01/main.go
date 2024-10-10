package main

import (
	"github.com/abe-portfolio/portfolio/initializers"
	"github.com/gin-gonic/gin"
)

// main()より先に実行される
func init() {
	initializers.LoadEnvValiables()
	initializers.ConnectToDB()
}

func main() {
	// Ginのデフォルトのルーターを作成
	router := gin.Default()

	// ルートハンドラーを設定
	router.GET("/", func(c *gin.Context) {
		c.JSON(200, gin.H{
			"message": "pong",
		})
	})

	// サーバーを起動
	router.Run()
}
