//go:build ignore
// +build ignore

// PostgreSQL接続テスト用
package main

import (
	"context"
	"fmt"
	"os"
	"time"

	"github.com/jackc/pgx/v5"
)

func main() {
	dsn := "postgres://wikiuser:wikipass@localhost:5432/wiki"
	conn, err := pgx.Connect(context.Background(), dsn)
	if err != nil {
		fmt.Println("DB接続失敗:", err)
		os.Exit(1)
	}
	defer conn.Close(context.Background())

	fmt.Println("✅ PostgreSQL 接続成功")

	var now time.Time
	err = conn.QueryRow(context.Background(), "SELECT NOW()").Scan(&now)
	if err != nil {
		fmt.Println("クエリ失敗:", err)
		os.Exit(1)
	}

	fmt.Println("現在時刻:", now)
}
