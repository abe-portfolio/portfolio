// byte型

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

	/*
		まとめ  []byteに続く{}と()
			・[]byte{バイトコード}
			　  -> byte型の文字コードをstring型(普通の文字列)に変換する

			・[]byte("文字列")
			　  -> string型の文字列をbyte型のバイトコードに変換する
	*/
}
