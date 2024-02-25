package main

import (
	"fmt"
)

func main() {
	var a [2]int
	a[0] = 100
	a[1] = 200
	fmt.Println(a)

	var b [2]int = [2]int{100, 200}
	fmt.Println(b)
	// b = append(b, 300) エラーになる。配列はリサイズできない

	// 以下は配列ではなくスライス
	var c []int = []int{100, 200}
	fmt.Println(c)
	c = append(c, 300)
	fmt.Println(c)
}
