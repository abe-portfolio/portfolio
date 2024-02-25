package main

import (
	"fmt"
)

func foo_1(param1, param2 int) {
	// pass
}

// 可変長引数 ...
func foo_2(params ...int) {
	fmt.Println(len(params), params)

	for _, param := range params {
		fmt.Println(param)
	}
}

func main() {
	// 引数の数が足りないので30のところにエラーが出ている
	// foo_1(10, 20, 30)
	foo_2(10, 20, 30)

	s := []int{1, 2, 3}
	fmt.Println(s)

	foo_2(s...)
}
