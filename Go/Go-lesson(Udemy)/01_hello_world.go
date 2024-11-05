package main

import (
	"fmt"
)

// __init__と同じ。標準で搭載されている
// main packageであれば、main関数よりも"先"に実行される（他パッケージで使う際はimportする）
func init() {
	fmt.Println("init")
}

func bazz() {
	fmt.Println("Bazz")
}

func main() {
	fmt.Println("Hello World!", "TEST TEST")
	bazz()
}

/*
　複
　数
　列
　コ
　メ
　ン
　ト
　ア
　ウ
　ト
*/
