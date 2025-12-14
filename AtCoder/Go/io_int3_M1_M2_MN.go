//go:build ignore
// +build ignore

/*
   ↑ ビルドタグ（Go1.17以前用と以降用で２つ記載している）
   このファイルを通常のビルドから外す。
   -> main関数が他ファイルにあっても競合しない（エラーを消す用に記載）
*/

// 整数として以下を受け取る
/*
    N
	M1 M2 ... MN
*/

// -------------------- ここから記述 --------------------
package main

import (
	"bufio"
	"fmt"
	"os"
	"strconv"
)

// 整数の受け取り
func nextInt(scanner *bufio.Scanner) int {
	scanner.Scan()
	n, _ := strconv.Atoi(scanner.Text())
	return n
}

func main() {
	reader := bufio.NewScanner(os.Stdin)
	reader.Split(bufio.ScanWords)

	N := nextInt(reader)
	M := make([]int, N)
	for i := 0; i < N; i++ {
		// Mはスライス
		M[i] = nextInt(reader)
	}

	fmt.Println()
}
