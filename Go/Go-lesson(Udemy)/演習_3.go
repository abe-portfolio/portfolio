package main

import "fmt"

type Vertex struct {
	X, Y int
}

func (v Vertex) Plus() int {
	return v.X + v.Y
}

func (v Vertex) String() string {
	return fmt.Sprintf("X is %d! Y is %d!", v.X, v.Y)
}

func main() {
	// Q1. 以下に、7と表示されるメソッドを作成してください
	v := Vertex{3, 4}
	fmt.Println(v.Plus())

	// Q2 X is 3! Y is 4! と表示されるStringerを作成してください。
	fmt.Println(v)
}
