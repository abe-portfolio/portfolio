package main

import (
	"fmt"
	"strconv"
)

func main() {
	var x int = 1
	xx := float64(x)
	// %f:float型で表示
	fmt.Printf("%T %v %f\n", xx, xx, xx)

	var y float64 = 1.2
	yy := int(y)
	// %d:int型で表示
	fmt.Printf("%T %v %d\n", yy, yy, yy)

	var s string = "14"
	/*
		z := int(s)
		※GoではString　⇔　int などの変換はできないが、
		以下の方法により実現可能
	*/

	// Atoi：Ascii to integer
	/*
		strconv.Atoi() はint型とerrorの２つを返す
		iはintを受け取り、_はerrorを受け取る
		_ を採用した理由はerrorがない時(nilではないとき)、
		if文などによるエラーハンドリングが必要になるが
		_であれば使用しなくてもコンパイルエラーを避けることができるため採用している
	*/
	i, _ := strconv.Atoi(s)
	fmt.Printf("%T %v", i, i)

}
