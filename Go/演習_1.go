package main

import (
	"fmt"
)

func main() {
	// Q1. f := 1.11 をint型に変換して出力
	f := 1.11
	fmt.Println("Q1：", int(f))

	// Q2. s := []int{1, 2, 5, 6, 2, 3, 1}
	//     fmt.Println(s[2:4]) の出力結果をコードを書かずに解答
	fmt.Println("Q2：[5 6]")

	// Q3. fmt.Printf("%T %v", m, m) を実行したときに
	//     map[string]int map[Mike:20 Nancy:24 Messi:30]と出力されるコードを作成
	m := map[string]int{
		"Mike":  20,
		"Nancy": 24,
		"Messi": 30,
	}
	fmt.Printf("Q3：%T %v", m, m)
}
