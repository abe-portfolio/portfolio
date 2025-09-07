package main

import (
	"fmt"
)

func main() {
	// make()：cap(キャパシティ=確保しているメモリ)が５の配列に対して３要素を作成している
	n := make([]int, 3, 5)
	fmt.Printf("len=%d cap=%d value=%v\n", len(n), cap(n), n) // len=3 cap=5 value=[0 0 0]
	n = append(n, 0, 0)
	fmt.Printf("len=%d cap=%d value=%v\n", len(n), cap(n), n) // len=5 cap=5 value=[0 0 0 0 0]
	n = append(n, 1, 2, 3, 4, 5)
	fmt.Printf("len=%d cap=%d value=%v\n", len(n), cap(n), n) // len=10 cap=10 value=[0 0 0 0 0 1 2 3 4 5]

	// キャパシティを省略すると、要素数分のキャパシティが確保される
	a := make([]int, 3)
	fmt.Printf("len=%d cap=%d value=%v\n", len(a), cap(a), a) // len=3 cap=3 value=[0 0 0]

	b := make([]int, 0)
	var c []int
	fmt.Printf("len=%d cap=%d value=%v\n", len(b), cap(b), b) // len=0 cap=0 value=[]　　　※0のスライスをメモリに確保する
	fmt.Printf("len=%d cap=%d value=%v\n", len(c), cap(c), c) // len=0 cap=0 value=[]　　　※メモリは確保しない = nil

	d := make([]int, 5)
	for i := 0; i < 5; i++ {
		d = append(d, i)
		fmt.Println(d)
		// [0 0 0 0 0 0]
		// [0 0 0 0 0 0 1]
		// [0 0 0 0 0 0 1 2]
		// [0 0 0 0 0 0 1 2 3]
		// [0 0 0 0 0 0 1 2 3 4]
	}
	fmt.Println(d) // [0 0 0 0 0 0 1 2 3 4]

	e := make([]int, 0, 5)
	for i := 0; i < 5; i++ {
		e = append(e, i)
		fmt.Println(e)
		// [0]
		// [0 1]
		// [0 1 2]
		// [0 1 2 3]
		// [0 1 2 3 4]
	}
	fmt.Println(e) // [0 1 2 3 4]
}
