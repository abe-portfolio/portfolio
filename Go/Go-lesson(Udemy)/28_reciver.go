package main

import "fmt"

type Vertex2 struct {
	X, Y int
}

func (v Vertex2) Area() int {
	return v.X * v.Y
}

func (v *Vertex2) Scale(i int) {
	v.X = v.X * i
	v.Y = v.Y * i
}

/*
func Area(v Vertex2) int {
	return v.X * v.Y
}
*/

func main() {
	v := Vertex2{3, 4}
	// fmt.Println(Area(v))
	fmt.Println("-----------------------------------------------------------")
	fmt.Println(v.Area())
	v.Scale(10)
	fmt.Println(v.Area())

}
