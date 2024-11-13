// Udemy sakai jun Go 49~

package main

import (
	"fmt"
	"sync"
)

func goroutine(s string, wg *sync.WaitGroup) {
	defer wg.Done()
	for i := 0; i < 5; i++ {
		// time.Sleep(100 * time.Millisecond) // どちらもコメントアウトするとhelloしか表示されなくなる
		fmt.Println(s)
	}
	// wg.Done()
}

func nomal(s string) {
	for i := 0; i < 5; i++ {
		// time.Sleep(100 * time.Millisecond) // どちらもコメントアウトするとhelloしか表示されなくなる
		fmt.Println(s)
	}
}

func main() {
	var wg sync.WaitGroup
	wg.Add(1)　// このwgの数とDoneの数が合わないとgoroutineの終了待ちで予期せぬ挙動をする
	/*
		以下は同じ意味
		wg.Add(1)
		wg.Add(1)
			と
		wg.Add(2)
	*/


	// 関数名の前にgoを付けるだけで並列処理になる
	go goroutine("world", &wg)
	nomal("hello")
	// time.Sleep(2000 * time.Millisecond) // スレッド生成があるため、goroutineの方が実行がわずかに遅い。２秒ほどプログラム終了まで猶予を持たせればコンソールに表示させることが可能
	wg.Wait() // wg.Done()が実行されるまでプログラムの終了を待つ
}
