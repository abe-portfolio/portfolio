package main

import (
	"fmt"
)

func main() {
	result := by2(10)

	if result == "ok" {
		fmt.Println("Great")
	}

	// resultへの代入をif文の中で定義することも可能
	// ※ただし、result2のスコープはifステートメント内のみ！
	if result2 := by2(12); result2 == "ok" {
		fmt.Println("Greate2")
	}

	/*
		num := 9
		if num%2 == 0 {
			fmt.Println("by 2")
		} else if num%3 == 0 {
			fmt.Println("by 3")
		} else {
			fmt.Println("else")
		}
	*/

	x, y := 10, 11
	if x == 10 && y == 11 {
		fmt.Println("&&")
	}

	if x == 10 || y == 10 {
		fmt.Println("||")
	}
}

func by2(num int) string {
	if num%2 == 0 {
		return "ok"
	} else {
		return "no"
	}
}
