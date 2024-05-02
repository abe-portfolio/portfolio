/*
Stringer ストリンジャー
Pythonでいうところの__str__(self)みたいなもん

type Stringer interface {
	String() string
}

上記をfmtパッケージに含まれているもので、String()に定義されているように
fmt.Println()で実行される。
*/

package main

import "fmt"

// 下記波線はPersonが他のmainパッケージのファイルと重複しているからだが、問題なく出力されるので今は考慮しなくてよい
type Person struct {
	Name string
	Age  int
}

// 実際に出力の形式を書き換えたいとき
func (p Person) String() string {
	// Sprintf()は、printfでの出力時にstring型にして出力する。そのため、戻り値型の指定でstringが必須
	return fmt.Sprintf("My name is %v", p.Name)
}

func main() {
	mike := Person{"Mike", 22}
	fmt.Println(mike)
}

/*
Stinger （String()のこと）実装前
fmt.Println(mike)
 -> {Mike 22}

 Stinger 実装後
fmt.Println(mike)
 -> My name is Mike

 ※Person structで定義しているAgeも表示されなくなっている
*/
