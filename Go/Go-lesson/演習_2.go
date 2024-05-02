package main

import (
	"fmt"
	"math"
)

func findMin(slice []int) int {
	if len(slice) == 0 {
		// スライスが空の場合、エラーなどに対応するために適切な値を返すか、エラー処理を追加することが推奨されます。
		// ここでは0を返していますが、具体的な要件に応じて変更してください。
		return 0
	}

	minValue := math.MaxInt64 // int型の最大値で初期化　=　9223372036854775807

	// sliceに対するfor 文は「インデックス値」と「値」をreturnするのでfor文も「_」と「value」で受け取る
	for _, value := range slice {
		if value < minValue {
			minValue = value
		}
	}

	return minValue
}

func main() {
	/*
		Q1 . 以下のスライスから一番小さい数を探して出力するコードを書いてください。
	*/
	L := []int{100, 300, 23, 11, 23, 2, 4, 6, 4}

	// スライスから一番小さい値を見つける
	minValue := findMin(L)

	// 結果を表示
	fmt.Println("一番小さい値:", minValue)

	/*
		Q2. 以下の果物の価格の合計を出力するコードを書いてください。
	*/
	M := map[string]int{
		"apple":  200,
		"banana": 300,
		"grapes": 150,
		"orange": 80,
		"papaya": 500,
		"kiwi":   90,
	}

	sum := 0
	// mapに対するfor 文は「キー（フィールド名）」と「値」をreturnするのでfor文も「_」と「m」で受け取る
	for _, m := range M {
		sum += m
	}
	fmt.Println(sum)
}
