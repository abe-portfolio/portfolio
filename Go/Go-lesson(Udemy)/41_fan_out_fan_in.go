/*
fan outとfan in
	ch <-chan int ： fan in
	ch chan<- int ： fan out
*/

package main

import "fmt"

func producer(first chan int) {
	for i := 0; i < 10; i++ {
		first <- i
	}
	close(first)
}

// first <-chan int　は、この関数ではfirstを受信用のチャネルとして使用することを明示的に宣言（<-chanのこと）
// second chan<- int　は、この関数ではsecondを送信用のチャネルとして使用することを明示的に宣言（chan<-のこと）（「second <-chan int」と書くとエラーになる）
func multi2(first <-chan int, second chan<- int) {
	for i := range first {
		second <- i * 2
	}
	close(second)
}

// second <-chan int　は、この関数ではsecondを受信用のチャネルとして使用することを明示的に宣言（<-chanのこと）
// third chan<- int　は、この関数ではthirdを送信用のチャネルとして使用することを明示的に宣言（chan<-のこと）（「third <-chan int」と書くとエラーになる）
func multi4(second <-chan int, third chan<- int) {
	for i := range second {
		third <- i * 4
	}
	close(third)
}

func main() {
	first := make(chan int)
	second := make(chan int)
	third := make(chan int)

	go producer(first)
	go multi2(first, second)
	go multi4(second, third)

	for result := range third {
		fmt.Println(result)
	}

	/*
		１．producer()より、0~9までfirstチャネルに送信される
		２．multi2()では、for文でfirstチャネルの要素数分ループする（iの値はfirstチャネルの要素)
		３．multi2()での処理結果をsecondチャネルに送信
		４・multi4()では、for文でsecondチャネルの要素数分ループする（iの値はsecondチャネルの要素)
		５．multi4()での処理結果をthirdチャネルに送信
		６．main()のfor文でresultがthirdチャネルの値を受け取り、fmt.Println(result)で表示
	*/

}
