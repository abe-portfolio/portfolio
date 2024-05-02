package main

import (
	"fmt"
)

func main() {
	t, f := true, false
	// %T:型を出力　%v:値を出力　%t:明示的にbool型かを判断
	fmt.Printf("%T %v %t\n", t, t, t)
	fmt.Printf("%T %v %t\n", f, f, 1) // %tの引数をint型にしてみる

	fmt.Println("-----------------------------------------------------------")

	fmt.Println("true && true:", true && true)
	fmt.Println("true && false:", true && false)
	fmt.Println("false && true:", false && true)
	fmt.Println("false && false:", false && false)

	fmt.Println("-----------------------------------------------------------")

	fmt.Println("true || true:", true || true)
	fmt.Println("true || false:", true || false)
	fmt.Println("false || true:", false || true)
	fmt.Println("false || false:", false || false)

	fmt.Println("-----------------------------------------------------------")

	fmt.Println("!true:", !true)
	fmt.Println("!false:", !false)

}
