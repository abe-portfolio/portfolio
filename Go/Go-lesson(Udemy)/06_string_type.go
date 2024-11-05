package main

import (
	"fmt"
	"strings"
)

func main() {
	fmt.Println("Hello World!")
	fmt.Println("Hello " + "World!")
	fmt.Println("Hello World!"[0]) // 72(ASCIIコード)

	// ASCIIコードではなく文字列のインデックス０を取り出したい場合はキャストする
	fmt.Println(string("Hello World!"[0]))

	var s string = "Hello World!"
	fmt.Println(strings.Replace(s, "H", "X", 1))
	fmt.Println(s)

	s = strings.Replace(s, "H", "X", 1)
	fmt.Println(s)

	// 第二引数の文字列が含まれるか？
	fmt.Println(strings.Contains(s, "World"))

	// ダブルクォーテーションで改行コードなしに改行するとエラーになる
	fmt.Println(`Test
	                      Test`)

	fmt.Println("\"")
	fmt.Println(`"`)
}
