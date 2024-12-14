package main

import (
	"go-QRcode/M_Generator"
	"go-QRcode/M_Reader"

	"github.com/gin-gonic/gin"
)

func main() {
	M_Reader.R_index()
	M_Generator.G_index()

	r := gin.Default()

	r.GET("/", func(c *gin.Context) {
		c.JSON(200, gin.H{"message": "OK"})
	})

	r.Run(":8080")
}
