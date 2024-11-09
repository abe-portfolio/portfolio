package main

import (
	"fmt"

	"github.com/gin-gonic/gin"
	// "github.com/labstack/echo/v4"  Echo
	// gin
	//GORMドライバー：SQLite
)

func main() {
	fmt.Println("Hello, World")

	rt := gin.Default()

	rt.LoadHTMLGlob("templates/*.html")
	rt.Static("/static", "./static")

	rt.GET("/", func(c *gin.Context) {
		c.HTML(200, "index.html", gin.H{
			"name": "Gin-User",
		})
	})

	rt.Run(":8080")
}
