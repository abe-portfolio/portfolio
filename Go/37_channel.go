/*
チャネル　：　Goroutineは値を返せないので、並列でもデータのやり取りを可能にする機能

	１．c := make(chan int)　でchannelを宣言する
	２．go goroutine_1(s, c)　go 関数名(引数1, c)のように、引数にchannelを含めて呼び出す
	３．func goroutine_1(s []int, c chan int) { ... }　のように関数宣言時にも引数にchannelを指定する
	４．c <- 変数　でチャネルへデータを格納する
	５．変数 := <-c　でチャネルからデータを受け取り、変数へ格納する

	※１の宣言にて、channelはキューのような構造になり、複数のgoroutineによってchannelにデータを送信した際、
	　値1, 値2, ...というように格納され、channelからデータを受け取る際に先入先出でデータを渡す。
*/
package main

import "fmt"

func goroutine_1(s []int, c chan int) {
	sum := 0
	for _, v := range s {
		sum += v
	}
	// channelに送信
	c <- sum
}

func goroutine_2(s []int, c chan int) {
	sum := 0
	for _, v := range s {
		sum += v
	}
	// channelに送信
	c <- sum
}

func main() {
	s := []int{1, 2, 3, 4, 5}
	// channelの宣言
	c := make(chan int)
	// c := make(chan int, 2)　とすると、受信する値の数を制限できる　詳しくは次項！

	go goroutine_1(s, c)
	go goroutine_2(s, c)

	// channelから受け取り xがcからデータを受け取れるまで待機するのでwg.Wait()を記述しなくても同様の動作をする
	x := <-c
	fmt.Println(x)

	y := <-c
	fmt.Println(y)
}
