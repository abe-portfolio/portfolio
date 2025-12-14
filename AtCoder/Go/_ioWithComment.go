//go:build ignore
// +build ignore

/*
   ↑ ビルドタグ（Go1.17以前用と以降用で２つ記載している）
   このファイルを通常のビルドから外す。
   -> main関数が他ファイルにあっても競合しない（エラーを消す用に記載）
*/

package main

import (
	"bufio"
	"os"
	"strconv"
)

// nextInt は scanner から整数を 1 つ読み取り int で返す関数。
// ScanWords 分割を前提にしており、スペース・改行区切りで整数を取り出す。
// scanner.Scan() で次のトークンを読み込み、Text() で文字列を取得し、Atoi で整数化する。
func nextInt(scanner *bufio.Scanner) int {
	scanner.Scan()                       // 次の入力（トークン）を読み込む
	n, _ := strconv.Atoi(scanner.Text()) // 読み取った文字列を int に変換（競プロではエラー無視が一般的）
	return n
}

func main() {
	// 標準入力を高速に読み取るための Scanner を作成。
	reader := bufio.NewScanner(os.Stdin)

	// デフォルトは行単位の読み取りなので、単語（スペース/改行区切り）単位に変更する。
	// 競プロではこれが最も扱いやすく高速。
	reader.Split(bufio.ScanWords)

	// 以下パターン
	// N
	N := nextInt(reader)
}
