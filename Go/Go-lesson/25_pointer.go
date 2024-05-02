package main

import "fmt"

func one(x int) {
	x = 1
}

func one_1(x *int) {
	*x = 1
}

func main() {
	var n int = 100
	fmt.Println("n ：", n)

	fmt.Println("&n：", &n)

	var p *int = &n
	fmt.Println("p ：", p)
	fmt.Println("*p：", *p)

	/*
				【解説】
				fmt.Println(&n)で出力されるのが、変数nのメモリアドレス
				前回の出力結果では、「&n： 0xc000100028」だった。 -> 変数nのメモリアドレス：0xc000100028
				この 0xc000100028 には、var n int = 100 より、値100が格納されている

				次に、var p *int = &n より、変数pには、変数nのメモリアドレスが格納される。（変数pの本当のメモリアドレスは0xc000100028とは別）
				型の前に「*」をつけることでポインター型となる。

				例）
									address| memory
									0x0000 |
				var n int = 100 → 	0x0004 |  100   ←─┐
		        					0x0008 |          │　　fmt.Println(*p)　-> 100　　 pに格納されているアドレスの中身を確認
									0x000c |	      │
				var p *int = &n → 	0x0010 |  0x0004 ─┘　　fmt.Println(p)   -> 0x0004  pの値（アドレスを参照）

	*/

	var y int = 150
	one(y)
	fmt.Println("y ：", y)

	one_1(&y)
	fmt.Println("&y：", y)

}
