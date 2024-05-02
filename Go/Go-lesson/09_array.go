/*
	配列とスライスの違い
	結論：サイズを指定して定義すると配列＝不可変
	　　　サイズを指定せず定義するとスライス＝可変

	配列の定義
		array0 := [3]int {1, 2, 3}
		array1 := [...]int {1, 2, 3, 4}

	スライスの定義
		slice0 := []int {1, 2, 3}
		slice1 := make([]int, 3, 5)
*/

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
	// b = append(b, 300) エラーになる。配列はリサイズできないため、3つ目の要素(300)を追加したくてもできない

	// 以下は配列ではなくスライス([]intとしていてサイズを定義時に指定していないため)
	var c []int = []int{100, 200}
	fmt.Println(c)
	c = append(c, 300)
	fmt.Println(c)
}
