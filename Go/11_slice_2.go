package main

import (
	"fmt"
)

func main() {
	// make()：cap(キャパシティ=確保しているメモリ)が５の配列に対して３要素を作成している
	n := make([]int, 3, 5)
	fmt.Printf("len=%d cap=%d value=%v\n", len(n), cap(n), n)
	n = append(n, 0, 0)
	fmt.Printf("len=%d cap=%d value=%v\n", len(n), cap(n), n)
	n = append(n, 1, 2, 3, 4, 5)
	fmt.Printf("len=%d cap=%d value=%v\n", len(n), cap(n), n)

	a := make([]int, 3)
	fmt.Printf("len=%d cap=%d value=%v\n", len(a), cap(a), a)

	b := make([]int, 0) // 0のスライスをメモリに確保する
	var c []int         // メモリは確保しない = nil
	fmt.Printf("len=%d cap=%d value=%v\n", len(b), cap(b), b)
	fmt.Printf("len=%d cap=%d value=%v\n", len(c), cap(c), c)

	d := make([]int, 5)
	for i := 0; i < 5; i++ {
		c = append(d, i)
		fmt.Println(d)
	}
	fmt.Println(d)

	e := make([]int, 0, 5)
	for i := 0; i < 5; i++ {
		c = append(e, i)
		fmt.Println(e)
	}
	fmt.Println(e)
}
