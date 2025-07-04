//標準入力からの入力受付のテンプレ

package main

import (
	"fmt"
)

func main() {
	var input string
	fmt.Print("入力してください: ")
	fmt.Scanln(&input)
	fmt.Println("入力された文字列:", input)
}
