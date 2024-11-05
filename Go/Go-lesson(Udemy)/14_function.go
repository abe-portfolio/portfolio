package main

import (
	"fmt"
)

// func(引数１ 引数１の型, 引数２ 引数２の型) 返り値の方{}
func add(x, y int) int {
	/*
		fmt.Println("add function")
		fmt.Println(x + y)
	*/
	return x + y
}

// ２つ以上の返り値を返す場合
func add_2(x2, y2 int) (int, int) {
	return x2 + y2, x2 - y2
}

func cal(price, item int) (result int) {
	// 関数定義の戻り値指定の際にresultを宣言しているので:=は使えない
	// (result int)を intとした場合、result = はresult := となる
	result = price * item
	return
}

func main() {
	r := add(10, 20)
	fmt.Println(r)

	r2_1, r2_2 := add_2(50, 20)
	fmt.Println(r2_1, r2_2)

	r3 := cal(100, 2)
	fmt.Println(r3)

	f := func(x int) {
		fmt.Println("inner func", x)
	}
	f(1)

	// わざわざ格納しなくても同じ結果になる
	func(x int) {
		fmt.Println("inner func", x)
	}(1)
}
