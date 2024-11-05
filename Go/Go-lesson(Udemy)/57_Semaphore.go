// Semaprhore（セマフォ）とは？
//  ->複数のゴルーチンが共有リソースへのアクセスを調整するための同期原理の一つ
//  ->同時に実行させるGorutineの数を制限したり　などが可能

package main

import (
	"context"
	"fmt"
	"time"

	"golang.org/x/sync/semaphore"
)

// ここで、いくつ同時にGorutineを実行可能にするかを設定（今回は１つ）
var s *semaphore.Weighted = semaphore.NewWeighted(1)

func LongProcess(ctx context.Context) {
	/* 待機状態にあるGorutineは終了待ちではなくキャンセルさせる
	isAcqire := s.TryAcquire(1)
	if isAcqire {
		fmt.Println("Gorutineはキャンセルされました")
		return
	}

	【出力】
	Wait...
	Gorutineはキャンセルされました　※Gorutine2はキャンセル
	Gorutineはキャンセルされました　※Gorutine3はキャンセル
	Donr
	*/

	// .Acquire()で他のGorutineを待機させる
	if err := s.Acquire(ctx, 1); err != nil {
		fmt.Println(err)
		return
	}
	// Gorutineの排他制御を解放
	defer s.Release(1)
	fmt.Println("Wait...")
	time.Sleep(1 * time.Second)
	fmt.Println("Done")
}

func main() {
	ctx := context.TODO()
	go LongProcess(ctx)
	go LongProcess(ctx)
	go LongProcess(ctx)
	time.Sleep(5 * time.Second)
}
