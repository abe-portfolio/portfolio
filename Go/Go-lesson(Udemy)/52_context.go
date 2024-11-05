// context　longProcess()が長くかかりすぎているときにキャンセルさせる機能
// goroutineなどで処理のデッドラインを設けたい時などによく使われる

package main

import (
	"context"
	"fmt"
	"time"
)

func longProcess(ctx context.Context, ch chan string) {
	fmt.Println("run")
	time.Sleep(2 * time.Second)
	fmt.Println("finish")
	ch <- "result"
}

func main() {
	ch := make(chan string)
	ctx := context.Background()
	ctx, cancel := context.WithTimeout(ctx, 1*time.Second)
	defer cancel()
	go longProcess(ctx, ch)

CTXLOOP:
	for {
		select {
		case <-ctx.Done():
			fmt.Println(ctx.Err())
			break CTXLOOP
		case <-ch:
			fmt.Println("success")
			break CTXLOOP
		}
	}

	// ctx2 := context.TODO()
	// 上記は、contextを引数にとるgoroutineに対して、まだタイムアウト値やキャンセルするかどうかなどが決まっていないときに使用することでエラーが出ないようにする
}
