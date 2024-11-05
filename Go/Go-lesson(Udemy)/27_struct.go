package main

import "fmt"

type Vertex struct {
	X, Y int
	S    string
}

func change_Vertex(v Vertex) {
	v.X = 1000
}

func change_Vertex2(v *Vertex) {
	v.X = 1000
}

func main() {
	v := Vertex{X: 3, Y: 6}
	fmt.Println(v)
	fmt.Println(v.X, v.Y)
	v.X = 100
	fmt.Println(v)

	fmt.Println("-----------------------------------------------------------")

	v2 := Vertex{X: 1}
	fmt.Println(v2)

	fmt.Println("-----------------------------------------------------------")

	v3 := Vertex{X: 10, Y: 40, S: "test"}
	fmt.Println(v3)

	fmt.Println("-----------------------------------------------------------")

	v4 := Vertex{}
	fmt.Println(v4)

	fmt.Println("-----------------------------------------------------------")

	var v5 Vertex
	fmt.Println(v5)

	fmt.Println("-----------------------------------------------------------")

	v6 := new(Vertex)
	fmt.Println(v6)

	fmt.Println("-----------------------------------------------------------")

	v7 := &Vertex{}
	fmt.Println(v7)

	// v4とv5、v6とv7は同じ

	/*
		struct ではv6よりもv7の書き方の方がよく使われる
		sliceなどでは、
			s := make([]int, 0)
			s := []int{}
		で同じ意味になるが、メモリを確保できる点も含め、make()の方をよく使う
	*/

	fmt.Println("-----------------------------------------------------------")

	z := Vertex{1, 2, "test"}
	change_Vertex(z)
	fmt.Println(z)

	fmt.Println("-----------------------------------------------------------")

	z2 := &Vertex{1, 2, "test"}
	change_Vertex2(z2)
	fmt.Println(z2)
	fmt.Println(*z2)

}
