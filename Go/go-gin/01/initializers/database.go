package initializers

import (
	"log"

	"gorm.io/driver/postgres"
	"gorm.io/gorm"
)

var DB *gorm.DB

func ConnectToDB() {
	var err error
	// postgresSQLでの場合("host=localhost user=<ユーザーネーム> password=<パスワード> dbname=<データベース名> port=<ポート番号> sslmode=<enable/disable> TimeZone=<タイムゾーン（※削除可能）>")
	dsn := "host=localhost user=gingorm_test password=gogogo12345 dbname=gingorm_1 port=80 sslmode=disable"
	DB, err := gorm.Open(postgres.Open(dsn), &gorm.Config)

	if err != nil {
		log.Fatal("Failed to oonnect to database.")
	}
}
