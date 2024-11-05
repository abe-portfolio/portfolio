package main

import (
	"fmt"
	"time"
)

func main() {
	// time.Tickとtime.Afterは組み込みだが、チャネルを介して値を返すので以下のselect文のように取り出すだけの記載でも扱える
	tick := time.Tick(100 * time.Millisecond)
	boom := time.After(500 * time.Millisecond)

	// for文の子要素のselectにbreak文を書いてもうまく作動しない。
	// for文の子要素のselectから途中で抜ける動作を行うにはfor文の前に任意のラベル(今回はOuterLoop:)を設定し、「break ラベル名」をSelect文の中に書く
OuterLoop:
	for {
		select {
		case <-tick:
			fmt.Println("tick.")
		case <-boom:
			fmt.Println("BOOM!")
			// break
			break OuterLoop
			return
		default:
			fmt.Println("    .")
			time.Sleep(50 * time.Millisecond)
		}
	}
	fmt.Println("-----end for statement-----")
}
