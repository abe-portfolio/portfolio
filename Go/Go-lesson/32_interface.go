// interface とは？
// 前提：Go言語では型はメソッドを持つことができる。
//      メソッド->型が持つ関数
// interface とは、メソッドの型宣言の集合（わかりにくいね）
// 下記コードの例で解説
// 　１．type インターフェース名 interface{ メソッド名() 戻り値の型宣言 }
// 　２．type 構造体名 struct { 構造体の内容 }
// 　３．func (構造体のインスタンス化) メソッド名() {}
// 　４．var 変数名 インターフェース型 = 構造体名{値}
// 　５．変数名.メソッド名()
// ------------------------------------------------------------
/* 【実例】
    // インターフェースの定義
    type Greet interface {
		Greeting() string
    }

	// 各種構造体の定義
	type Person strucu {
		Name string
	}

	type Animal strucu {
		Name string
	}

	type Tree strucu {
		Name string
	}

	// メソッドの定義　※構造体の数だけ行う
	func (p *Person) Greeting() {
		// Person構造体に対するGreeting()の処理
		p.Name = "Mr." + p.Name
		fmt.Println("Hello, ", p.Name)
	}

	func (a Animal) Greeting() {
		// Animal構造体に対するGreeting()の処理
		fmt.Println("I don't know...")

	}

	func (t Tree) Greeting() {
		// Tree構造体に対するGreeting()の処理
		fmt.Println(t.Name, "is not greeting.")
	}

	func main() {
		var mike Greet = &Person{"Mike"}
		mike.Greeting()
		// Hello, Mr.Mike

		var dog Greet = Animal{"Dog"}
		dog.Greeting()
		// I don't know

		var oak Greet = Tree{"Oak"}
		ork.Greeting()
		// Oak is not greeting.
	}
*/
package main

import "fmt"

type Human interface {
	Say() string
}

type Person struct {
	Name string
}

func (p *Person) Say() string {
	p.Name = "Mr." + p.Name
	// fmt.Println(p.Name)
	return p.Name
}

func DriveCar(human Human) {
	if human.Say() == "Mr.Mike" {
		fmt.Println("Let's driving!")
	} else {
		fmt.Println("Get out!")
	}
}

func main() {
	var mike Human = &Person{"Mike"}
	// mike.Say()
	DriveCar(mike)
}
