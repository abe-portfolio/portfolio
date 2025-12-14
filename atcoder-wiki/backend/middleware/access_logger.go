package middleware

import (
	"time"

	"atcoder-wiki-backend/logger"

	"github.com/gin-gonic/gin"
)

func AccessLogger() gin.HandlerFunc {
	return func(c *gin.Context) {
		start := time.Now()
		c.Next()

		latency := time.Since(start)
		status := c.Writer.Status()

		logger.AccessLogger.Printf(
			"%s %s %d %s %s",
			c.ClientIP(),
			c.Request.Method,
			status,
			c.Request.URL.Path,
			latency,
		)
	}
}
