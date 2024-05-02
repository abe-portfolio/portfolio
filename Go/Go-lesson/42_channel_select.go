/*
Select文の構文
	select {
	case <-ch1:
	    ch1からデータを受信したときの処理
	case data := <-ch2:
	    ch2からデータを受信したときの処理
	case ch3 <- value:
	    ch3にデータを送信したときの処理
	default:
	    どのチャネルも準備ができていない場合の処理
	}
*/

package main

import (
	"fmt"
	"time"
)

// パケットを取得するようなアプリケーションのイメージ
func goroutine_a(ch chan string) {
	// forを無限ループさせ常にパケットを取得するようにする
	for {
		ch <- "packet from 1"
		time.Sleep(1 * time.Second)
	}

}

func goroutine_b(ch chan int) {
	for {
		ch <- 100
		time.Sleep(1 * time.Second)
	}
}

func main() {
	ch1 := make(chan string)
	ch2 := make(chan int)

	go goroutine_a(ch1)
	go goroutine_b(ch2)
	for {
		select {
		case msg1 := <-ch1:
			fmt.Println(msg1)
		case msg2 := <-ch2:
			fmt.Println(msg2)
		}
	}
}
