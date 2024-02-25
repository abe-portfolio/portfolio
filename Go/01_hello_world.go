package main

import (
	"fmt"
)

// __init__と同じ。
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
