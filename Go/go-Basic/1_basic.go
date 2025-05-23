package main

import (
	"fmt"
	"time"
)

// 基本構文のまとめ
func main() {
	//　１．Goに存在する構文
	//		・if
	//		・for
	//		・switch
	//		・defer
	//		・go
	//		・select
	//	※loopやwhileはforで実装できるためGoには存在しない

	// ２．各構文の解説
	// ２－１．if
	/*
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
			最も基本的な構文
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	if_x := 7
	if if_x > 10 {
		fmt.Println("if_xは10より大きい")
	} else if if_x > 5 {
		fmt.Println("if_xは5より大きいが、10以下")
	} else {
		fmt.Println("if_xは5以下")
	}

	/*
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
			ifブロックの中で変数を初期化することも可能
			その場合、その変数が有効なのはifブロック内のみ
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	if if_y := 7; if_y > 10 {
		fmt.Println("if_yは10より大きい")
	} else if if_y > 5 {
		fmt.Println("if_yは5より大きいが、10以下")
	} else {
		fmt.Println("if_yは5以下")
	}
	// fmt.Println(y)  // ifブロックの外側なのでエラーになる

	/*
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
			論理演算子（&&, ||）を使用してifブロックのネストを回避
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	if_z := 7
	// 両方の条件を満たす場合
	if if_z > 5 && if_z < 10 {
		fmt.Println("if_zは5より大きく、10より小さい")
	}

	// どちらかの条件を満たす場合
	if if_z < 5 || if_z > 10 {
		fmt.Println("if_zは5未満または10を超える")
	}

	// ──────────────────────────────────────────────────────────────────────────────────────────────────────
	// ２－２．for
	/*
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
			規定回数までループ（whileの実装）
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/

	for for_x := 0; for_x < 10; for_x++ {
		// 10回ループ
	}

	// 別の書き方１
	for_x1 := 0
	for for_x1 < 10 {
		// 10回ループ
		for_x1++
	}

	// 別の書き方２
	for for_x2 := 0; for_x2 < 10; { // ;が必要なことに注意
		// 10回ループ
		for_x2++
	}

	// ※以下はコンパイルエラーになる
	// for_x1 := 0
	// for for_x1 < 10; for_x1++ {
	// 	// 10回ループ
	// }

	/*
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
			条件を満たすまで無限ループ（loopの実装）
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	for {
		// 無限ループ
	}

	for_loop := true // 黄色の波線は、このコードでは１回しかループしないためfor(無限ループ)じゃなくていいんじゃない？という提案なので無視してよい
Loop:
	for {
		// 無限ループを抜けるための判定（for_loopの値がfalseならループを終了し後続処理へ）
		if !for_loop {
			break Loop
		}
		for_loop = false
	}
	fmt.Println("ループから抜けました。")

	/*
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
			配列などの要素の数の分だけループ
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	for_i := 0
	arr := []int{1, 2, 3, 4, 5}

	for for_i < len(arr) {
		fmt.Println("要素:", arr)
		for_i++
	}

	// より簡素な書き方
	arr2 := []int{1, 2, 3, 4, 5}

	for _, val := range arr2 { // _はインデックスを、valはそのインデックスの要素を受け取る
		fmt.Println("要素:", val)
	}

	// ──────────────────────────────────────────────────────────────────────────────────────────────────────
	// ２－３．switch
	/*
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
			変数の値をそのまま評価して処理の分岐
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	switch_x := 100
	switch switch_x {
	case 1:
		fmt.Println("switch_xの値は1です")
	case 10:
		fmt.Println("switch_xの値は10です")
	case 100:
		fmt.Println("switch_xの値は100です")
	default: // defaultは記載しなくてもコンパイルエラーにはならない。（でもお作法として書くべき）
		fmt.Println("default")
	}

	/*
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
			変数の値を処理してその結果を評価して処理の分岐
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	switch_y := 100
	switch {
	case switch_y%3 == 0:
		fmt.Println("switch_yの値は３の倍数です")
	case switch_y%2 == 0:
		fmt.Println("switch_yの値は２の倍数です")
	default:
		fmt.Println("default")
	}

	/*
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
			複数のcaseについて同様な処理を行いたいときの記載
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	switch_z := 150
	switch {
	case switch_z%3 == 0, switch_z%5 == 0: // カンマ区切りで複数のcaseを指定可能
		fmt.Println("switch_yの値は３の倍数または５の倍数です")
	default:
		fmt.Println("default")
	}

	// ──────────────────────────────────────────────────────────────────────────────────────────────────────
	// ２－４．defer
	/*
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
			遅延実行（最後に実行される）
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	defer fmt.Println("処理が終了しました")
	fmt.Println("処理を開始しました")
	defer_i := 0
	for defer_i < 10 {
		fmt.Println("処理中...")
		defer_i++
	}

	/*
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
			deferを複数書くとLIFO（last-in first-out）
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	defer fmt.Println("Defer 1")
	defer fmt.Println("Defer 2")

	fmt.Println("Main function")

	// Main function
	// Defer 2
	// Defer 1

	// deferを使用する場合
	//	１．リソースの解放
	//	２．ロックの解放
	//	３．トランザクションのコミットやロールバック
	//	４．リソースの初期化と解放
	//	５．エラーハンドリング

	// ──────────────────────────────────────────────────────────────────────────────────────────────────────
	// ２－５．go
	/*
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
			関数を平行実行させる（Goroutine）
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	// go_func()の宣言がめんどくさいので、コメントアウトしておく
	// go go_func() // このgo_func()はどこに定義しても良い

	go func() {
		// 非同期で実行したい内容
	}() // func()は無名関数。最後の()は即時実行。よって、無名関数の定義と同時に実行を行っている。

	// goは他にも様々なものが絡んでくるため最低限のサンプルコードのみ記述

	// ──────────────────────────────────────────────────────────────────────────────────────────────────────
	// ２－６．select
	/*
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
			複数のチャネルからの送受信を管理する
			複数のゴルーチンからの通信を効率的に処理できる
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++
	*/
	ch1 := make(chan string)
	ch2 := make(chan string)

	go func() {
		time.Sleep(1 * time.Second)
		ch1 <- "チャネル1からのメッセージ"
	}()

	go func() {
		time.Sleep(2 * time.Second)
		ch2 <- "チャネル2からのメッセージ"
	}()

	for i := 0; i < 2; i++ {
		select {
		case msg1 := <-ch1:
			fmt.Println("受信:", msg1)
		case msg2 := <-ch2:
			fmt.Println("受信:", msg2)
		}
	}

	fmt.Println("全てのメッセージを受信しました。")
}
