package main

import "fmt"

func thirdPartyConnectDB() {
	panic("Unable to connect database!")
}

func save() {
	defer func() {
		// recoverがpanicをキャッチする。panicが発生するとコードが強制終了する　なお、公式では非推奨
		s := recover()
		fmt.Println(s)
	}()
	thirdPartyConnectDB()
}

func main() {
	save()
	fmt.Println("OK?")
}
