package main

import (
	"fmt"
)

func main() {
	// var による宣言は関数外でも可能
	var i int = 1
	var f64 float64 = 1.2
	var s string = "test"
	var f bool = false
	var t bool = true
	// var t, f bool = true, false のように1行で書くこともできる
	fmt.Println(i, f64, s, f, t)
}

func another() {
	var (
		i    int     = 1
		f64  float64 = 1.2
		s    string  = "test"
		f, t bool    = false, true
	)
	fmt.Println(i, f64, s, f, t)
}

func short() {
	// := による宣言は関数内でのみ
	xi := 1
	//再代入 ※宣言はしないので:=と書かないように！
	xi = 2
	xf64 := 1.3
	xs := "test"
	xf, xt := false, true
	fmt.Println(xi, xf64, xs, xf, xt)
}
