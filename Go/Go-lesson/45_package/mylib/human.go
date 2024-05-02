package mylib

import "fmt"

type Person struct {
	Name string
	Age  int
	// age int  とすると、package mylib内ではアクセス可能だが、package mainなど他パッケージからは参照できない
}

func say() {
	fmt.Println("Human!")
}
