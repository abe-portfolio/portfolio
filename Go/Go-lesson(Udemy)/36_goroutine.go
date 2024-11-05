/*
Goroutineに必要なもの
	１．var wg sync.WaitGroup　の宣言
	２．wg.Add(1)　WaitGroupの追加
	３．go goroutine("world", &wg)　呼び出し（go 関数名(引数, &wg) <-１で定義したWaitGroup
	４．func goroutine(s string, wg *sync.WaitGroup) { ... }　引数部分に注目
	５．wg.Done()　上記関数（go句をつけて呼び出した関数の処理の最後か、deferをつけて好きなタイミングで記述）
	６．wg.Wait()　３の呼び出し元の関数内でwg.Done()が実行されるまでプログラムの終了を待つ

	※Goroutineで実行している関数は値を返せない。
	　値を返したい場合は次項のチャネルを使用する
*/

package main

import (
	"sync"
)

func goroutine(s string, wg *sync.WaitGroup) {
	for i := 0; i < 5; i++ {
		// time.Sleep(100 * time.Millisecond)
		println(s)
	}
	wg.Done()
}

func nomal(s string) {
	for i := 0; i < 5; i++ {
		// time.Sleep(100 * time.Millisecond)
		println(s)
	}
}

func main() {
	var wg sync.WaitGroup
	wg.Add(1)
	// goをつけると並列化
	go goroutine("world", &wg)
	nomal("hello")
	wg.Wait()
}
