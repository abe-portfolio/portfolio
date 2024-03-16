package main

import "fmt"

// 空のinterface型 = どんな型も受け付けれる do(10)やdo("Mike")など
func do(i interface{}) {
	/* 　do(10)の場合
	// ii := i * 2    interface型だと「*2」ができずエラーになるのでタイプアサーションが必要
	ii := i.(int) * 2
	fmt.Println(ii)
	*/

	/* 　do("Mike")の場合
	ss :=  i.(strimg)
	fmt.Println(ss + "!")
	*/

	// どのような型にも対応できるようにする
	// ここのi.(type)アサーションはswitchとセットじゃないと使えない！　Switch type文
	switch v := i.(type) {
	case int:
		fmt.Println(v * 2)
	case string:
		fmt.Println(v + "!")
	default:
		fmt.Printf("I don't know %T\n", v)
	}
}

func main() {
	do(10)
	do("Mike")
	do(true)
}
