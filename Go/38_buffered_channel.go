package main

import "fmt"

func main() {
	ch := make(chan int, 2)
	ch <- 100
	fmt.Println(len(ch))
	ch <- 200
	fmt.Println(len(ch))
	/*
		バッファの数を超えて格納しようとするとエラーが発生する
		ch <- 300
		fmt.Println(len(ch))
	*/

	x := <-ch
	fmt.Println(x)
	fmt.Println(len(ch)) //　バッファの数が減っている

	fmt.Println("-----------------------------------------------------------")

	ch <- 200
	/*
		バッファの数以上に取り出そうとするエラーが発生する（今回だと、３回目のループでエラーが発生する）
		for c := range ch {
			fmt.Println(c)
		}
	*/

	// 先にchannelをcloseしておくことで上記のエラーが発生しなくなる
	close(ch)
	for c := range ch {
		fmt.Println(c)
	}
}
