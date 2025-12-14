//go:build ignore
// +build ignore

/*
   ↑ ビルドタグ（Go1.17以前用と以降用で２つ記載している）
   このファイルを通常のビルドから外す。
   -> main関数が他ファイルにあっても競合しない（エラーを消す用に記載）
*/

package main

import (
	"fmt"
)

func main() {
	// なんらかの処理の戻り値がtrueであることを想定してcondに代入
	cond := true

	// cond が true → "Yes"
	// cond が false → "No"
	fmt.Println(map[bool]string{true: "Yes", false: "No"}[cond])
}
