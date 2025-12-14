//go:build ignore
// +build ignore

/*
   ↑ ビルドタグ（Go1.17以前用と以降用で２つ記載している）
   このファイルを通常のビルドから外す。
   -> main関数が他ファイルにあっても競合しない（エラーを消す用に記載）
*/

// 文字列として以下を受け取る
/*
   S
*/

// -------------------- ここから記述 --------------------
package main

import (
	"bufio"
	"fmt"
	"os"
)

// 文字列の受け取り
func nextString(scanner *bufio.Scanner) string {
	scanner.Scan()
	return scanner.Text()
}

func main() {
	reader := bufio.NewScanner(os.Stdin)
	reader.Split(bufio.ScanWords)

	S := nextString(reader)

	fmt.Println()
}
