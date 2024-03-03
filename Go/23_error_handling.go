package main

import (
	"fmt"
	"log"
	"os"
)

func main() {
	file, err := os.Open("./演習_1.go")
	if err != nil {
		log.Fatalln("Error!")
	}

	defer file.Close()
	data := make([]byte, 100)
	// :=(ショートでクレアレーション)は最低１つ以上initializeするものがあればエラーにならない。
	// err のみだと初期化ではなくオーバーライドのみになるため、:=ではなく=のみを使用する。
	count, err := file.Read(data)
	if err != nil {
		log.Fatalln("Error!")
	}
	fmt.Println(count, string(data))

}
