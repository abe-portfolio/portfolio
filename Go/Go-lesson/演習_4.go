package main

import "fmt"

// 修正前：func goroutine(s []string, c chan int) {
func goroutine(s []string, c chan string) {
	sum := ""
	for _, v := range s {
		sum += v
		c <- sum
	}
	// 追加
	close(c)
}

func main() {
	/*
		test1!
		test1!test2!
		test1!test2!test3!
		test1!test2!test3!test4!

		と出力されるように、以下のコードを修正せよ。
	*/

	words := []string{"test1!", "test2!", "test3!", "test4!"}
	// 修正前：c := make(chan int)
	c := make(chan string)
	go goroutine(words, c)
	for w := range c {
		fmt.Println(w)
	}
}
