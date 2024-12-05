package main

import "fmt"

/*
	〇そもそも構造体とは？
		-> 複数のフィールドをまとめて一つのデータ型にすることができる複合データ型
		例として以下の構造体を考える。
		type Person struct {
			Name string
			Age  int
		}
		上記の構造体「Person」は、string型のフィールド（Name）とint型のフィールド（Age）を１つにまとめて独自に定義したPerson型という認識で良い。
		∴DBのテーブル定義の作成と似たイメージ
*/

type User struct {
	FirsrName string // 実際の業務では可読性・保守性の観点から１行ずつフィールドを記述する
	LastName  string
	Age       int
}

func instanse_USER() {
	user_1 := User{FirsrName: "Elen", LastName: "Joe", Age: 17}
	fmt.Println(user_1)
}

/*
	〇レシーバー
		-> ポインタレシーバー
			：データを変更しない場合

		-> 値レシーバー
			：データを変更する場合、または構造体が大きい場合


		∴構造体のデータと処理を一元管理でき、また、型に基づく振る舞いを追加できる。
*/

/*
	〇interface  ※structとセットで学ぶことが多いが全く別の概念なので注意！
		-> structがデータの集合なのに対して、interfaceはメソッドの集合体
*/

// 上のいろいろ実行用
func main() {
	fmt.Println("I'm a genius")
	// 〇そもそも構造体とは？
	instanse_USER() // 出力：{Elen Joe 17}

	// 〇レシーバー
}
