package main

import (
	"fmt"
	"math/rand"
)

func main() {
	// 乱数の生成
	a := rand.Intn(10)
	b := rand.Intn(10)
	c := rand.Intn(10)
	d := rand.Intn(10)

	// LeetCode 1. Two Sum
	nums := []int{a, b, c, d}
	target := 9
	result := twoSum(nums, target)
	fmt.Println("a:", a, "b:", b, "c:", c, "d:", d)
	fmt.Println("target:", target)
	if result != nil {
		fmt.Println(result)
	} else {
		fmt.Println("No matched target")
	}
}
