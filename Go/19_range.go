package main

import "fmt"

func main() {
	l := []string{"Python", "go", "Java"}

	for i := 0; i < len(l); i++ {
		fmt.Println(i, l[i])
	}

	fmt.Println("------------------")

	// goでは上記の処理をより簡潔に書ける
	// range：スライスの「インデックス」と「インデックスの場所の要素」を返す
	fmt.Println("・sliceの インデックス：値")
	for i, v := range l {
		fmt.Println(i, v)
	}

	// iを使用したくないとき
	fmt.Println("・sliceの 値のみ")
	for _, v := range l {
		fmt.Println(v)
	}

	fmt.Println("・sliceの 値のみ")
	for i := range l {
		fmt.Println(i)
	}

	fmt.Println("------------------")

	// range：mapの場合は返すもの（組み合わせ）は同じだが、返される順番がランダムになる
	m := map[string]int{"apple": 100, "banana": 200}

	fmt.Println("・Mapの キー：値")
	for k, v := range m {
		fmt.Println(k, v)
	}

	// スライスと違い、キーだけが欲しい時はvalueをもらう変数は書かなくてよい
	fmt.Println("・Mapの キーのみ")
	for k := range m {
		fmt.Println(k)
	}

	// 値が欲しい時はキーは「_」にする
	fmt.Println("・Mapの 値のみ")
	for _, v := range m {
		fmt.Println(v)
	}
}
