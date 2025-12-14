package middleware

import (
	"net/http"

	"atcoder-wiki-backend/logger"

	"github.com/gin-gonic/gin"
)

func SecurityLogger() gin.HandlerFunc {
	return func(c *gin.Context) {
		c.Next()

		status := c.Writer.Status()

		if status == http.StatusBadRequest ||
			status == http.StatusNotFound ||
			status == http.StatusMethodNotAllowed {

			logger.SecurityLogger.Printf(
				"%s %s %d %s",
				c.ClientIP(),
				c.Request.Method,
				status,
				c.Request.URL.Path,
			)
		}
	}
}
