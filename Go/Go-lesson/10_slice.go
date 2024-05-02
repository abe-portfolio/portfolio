/*
Slice とは？　→　Goにおけるデータ構造
sliceは連続した要素のコレクションを表す
要素の順序が保持される
Pythonではリスト（List）に相当

【宣言と初期化】
　１．makeを使用した初期化
　　mySlice := make([]int, 0, 5) // 長さ0、容量5のint型スライス

　２．リテラルを使用した初期化
　　mySlice := []int{1, 2, 3, 4, 5}


【要素の追加と削除】
　１．要素の追加
　　mySlice = append(mySlice, 6)

　２．要素の削除（例: インデックス2の要素を削除）
　　mySlice = append(mySlice[:2], mySlice[3:]...)


【要素へのアクセス】
　１．インデックスを指定して要素にアクセス
　　value := mySlice[2]


【長さと容量】
　・len() 関数でスライスの現在の長さを取得できます。
　・cap() 関数でスライスの容量を取得できます。
*/

package main

import (
	"fmt"
)

func main() {
	n := []int{1, 2, 3, 4, 5, 6}
	fmt.Println(n)
	fmt.Println(n[2])
	fmt.Println(n[2:4])
	fmt.Println(n[:4])
	fmt.Println(n[2:])
	fmt.Println(n[:])

	n[2] = 100
	fmt.Println(n)

	n = append(n, 100, 200, 300, 400)
	fmt.Println(n)

	var board = [][]int{
		[]int{0, 1, 2},
		[]int{3, 4, 5},
		[]int{6, 7, 8},
	}
	fmt.Println(board)

}
