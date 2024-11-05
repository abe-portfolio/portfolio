package main

import (
	"fmt"
)

const Pi = 3.14
const (
	Username = "test_user"
	Password = "test_pass"
)

/*
	9223372036854775807 はint型の最大値。
	+ 1によってvar宣言ではoverflowsするが、
	constであれば、出力時に-1によって
	最大値以内であればエラーにはならない。
*/

const big = 9223372036854775807 + 1

func main() {
	fmt.Println(Pi, Username, Password)
	fmt.Println(big - 1)
}
