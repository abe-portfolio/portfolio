package main

import (
	"fmt"
	"os"
)

func foo() {
	defer fmt.Println("World foo")

	fmt.Println("Hello foo")
}

func main() {
	/*
		foo()
		defer fmt.Println("World")

		fmt.Println("Hello")
	*/

	// 複数のdeferを用いた際の出力結果に注目 -> 先入れ後出し
	fmt.Println("run")
	defer fmt.Println(1)
	defer fmt.Println(2)
	defer fmt.Println(3)
	defer fmt.Println(4)
	fmt.Println("fin")

	// deferも活用例
	file, _ := os.Open("./演習_1.go")
	defer file.Close()
	// 文字列を扱う際にバイト配列を作成する
	data := make([]byte, 100)
	file.Read(data)
	fmt.Println(string(data))
}
