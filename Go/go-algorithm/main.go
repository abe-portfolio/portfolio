package main

import (
	"fmt"
	"os"
	"path/filepath"
	"regexp"
)

func main() {
	targetDir := "./AtCoder"

	// 正規表現でNNNを検出（3桁の数字）
	re := regexp.MustCompile(`^\d{3}$`)

	// 1段階目: 3桁のフォルダ名（NNN）を取得
	var nnnFolders []string
	err := filepath.Walk(targetDir, func(path string, info os.FileInfo, err error) error {
		if err != nil {
			return err
		}
		if info.IsDir() && re.MatchString(info.Name()) {
			nnnFolders = append(nnnFolders, path)
		}
		return nil
	})

	if err != nil {
		fmt.Println("エラー:", err)
		fmt.Println("プログラムを終了します")
		os.Exit(0)
	}

	// NNNフォルダを表示
	fmt.Println("取得したNNNフォルダ:")
	for _, folder := range nnnFolders {
		fmt.Println(folder)
	}

	// ユーザーが評価するコンテスト番号を入力
	var contestNumber string
	fmt.Print("評価するコンテスト番号を入力してください（例: 001）: ")
	fmt.Scan(&contestNumber)

	// 入力されたNNNフォルダの存在を確認
	selectedFolder := filepath.Join(targetDir, contestNumber)
	if _, err := os.Stat(selectedFolder); os.IsNotExist(err) {
		fmt.Println("エラー: 指定されたフォルダが存在しません")
		os.Exit(0)
	}

	// 2段階目: 指定されたNNNフォルダ内の .go ファイルを取得
	fmt.Println("取得した .go ファイル:")
	err = filepath.Walk(selectedFolder, func(path string, info os.FileInfo, err error) error {
		if err != nil {
			return err
		}
		// .go ファイルのみを表示
		if !info.IsDir() && filepath.Ext(path) == ".go" {
			fmt.Println(filepath.Base(path))
		}
		return nil
	})

	if err != nil {
		fmt.Println("エラー:", err)
		fmt.Println("プログラムを終了します")
		os.Exit(0)
	}

	fmt.Println("処理が正常に終了しました")
}
