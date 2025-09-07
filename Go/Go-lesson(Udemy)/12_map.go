/*
Map とは？　→　Goにおけるデータ構造
mapはキーと値のペアのコレクションを表す
要素の順序は保証されない
Pythonでは辞書（Dictionary）に相当

【宣言と初期化】
　１．makeを使用した初期化
　　myMap := make(map[string]int)

　２・リテラルを使用した初期化
　　myMap := map[string]int{"one": 1, "two": 2, "three": 3}


【要素の追加と削除】
　１．要素の追加
　　myMap["four"] = 4

　２．要素の削除
　　delete(myMap, "two")


【要素へのアクセス】
　１．キーを指定して要素にアクセス
　　value := myMap["three"]


【存在チェック】
　１．キーの存在を確認
　　value, exists := myMap["two"]


【イテレーション】
　１．マップのすべての要素をイテレート
　　for key, value := range myMap {
    　　fmt.Println(key, value)
　　}
*/

package main

import "fmt"

func main() {
	m := map[string]int{"apple": 100, "banana": 200}
	fmt.Println(m)          // map[apple:100 banana:200]
	fmt.Println(m["apple"]) // 100
	m["banana"] = 300
	fmt.Println(m) // map[apple:100 banana:300]
	m["new"] = 500
	fmt.Println(m) // map[apple:100 banana:300 new:500]

	// 存在しないキーを参照すると「0」が返る
	fmt.Println(m["nothing"]) // 0

	// ２つ目の返り値はキーが存在するかどうかのboolを返す
	v, ok := m["apple"]
	fmt.Println(v, ok) // 100 true

	v2, ok2 := m["nothig"]
	fmt.Println(v2, ok2) // 0 false

	// メモリ上に空のリストを作成してから値を代入する例
	m2 := make(map[string]int)
	m2["pc"] = 5000
	fmt.Println(m2) // map[pc:5000]

	/*
		以下はエラーとなる makeを使用していないため、メモリ上に後から代入するためのmapがない
		var m3  map[string]int
		m3["pc"] = 5000
		fmt.Println(m3) // panic: assignment to entry in nil map

		　→make()を使用することでメモリの確保が可能！
	*/

	// まとめ
	// varで宣言をすると、mapだろうとスライスだろうとメモリを確保しないため、nilとなる
	// →make()を使用することでメモリの確保が可能

}
