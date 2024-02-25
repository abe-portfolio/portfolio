package main

import (
	"fmt"
)

func main() {
	// ASCII code
	b := []byte{72, 73}
	fmt.Println(b)
	fmt.Println(string(b))

	// byte{}ではなくbyte()になるので注意
	c := []byte("HI")
	fmt.Println(c)
	fmt.Println(string(c))
}
