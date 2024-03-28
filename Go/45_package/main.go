package main

// importの記述順の例　標準 -> (サードパーティ) -> ローカルや自分で作成したパッケージ
import (
	"fmt"

	// GOプロジェクトとして作成していないためエラーになっている
	"45_package/mylib"
	"45_package/mylib/under"
)

func main() {
	s := []int{1, 2, 3, 4, 5}
	fmt.Println(mylib.Average(s))

	mylib.say()
	under.Hello()

	// milib\human.go で person として構造体を作成していたらエラーになる（Title記法で書くこと）
	myPerson := mylib.Person{Name: "Mike", Age: 20}
	println(myPerson)

}
