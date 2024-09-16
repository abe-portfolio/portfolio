package initializers

import (
	"log"

	"github.com/joho/godotenv"
)

// 他ファイルからLoadEnvValiables()を使用したいため、大文字スタートで記述する
func LoadEnvValiables() {
	// .envファイルの内容を読み取る（PORT=3000)
	err := godotenv.Load()
	if err != nil {
		log.Fatal("Error laoding .env file.")
	}
}
