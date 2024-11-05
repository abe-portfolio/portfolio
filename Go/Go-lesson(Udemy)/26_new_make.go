package main

import "fmt"

func main() {
	var p *int = new(int)
	fmt.Println(p)
	fmt.Println(*p)
	// new()で先にメモリを確保しているのでアドレスが返ってくる
	*p++
	fmt.Println(*p)

	var p2 *int
	fmt.Println(p2)
	// メモリがまだ確保されていないので<nil>が返ってくる
	// *p2++  panicが起こる(メモリが確保されていないため)
	// fmt.Println(*p2)

	fmt.Println("-----------------------------------------------------------")

	// --------makeとnewの違い------  ->  ポインター型が返ってくるものにはnewを使う
	// slice
	s := make([]int, 0)
	fmt.Printf("%T\n", s)

	// map
	m := make(map[string]int)
	fmt.Printf("%T\n", m)

	var k *int = new(int)
	fmt.Printf("%T\n", k)
}
