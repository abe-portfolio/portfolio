//go:build ignore
// +build ignore

package main

import (
	"bufio"
	"fmt"
	"os"
	"strconv"
)

func nextInt(reader *bufio.Scanner) int {
	reader.Scan()
	n, _ := strconv.Atoi(reader.Text())
	return n
}

func main() {
	reader := bufio.NewScanner(os.Stdin)
	reader.Split(bufio.ScanWords)

	N := nextInt(reader)
	A := make([]int, N)
	for i := 0; i < N; i++ {
		A[i] = nextInt(reader)
	}

	// reach は「倒れる右端の位置（0-index）」
	// 1番目のドミノ（index 0）が倒れると、カバー範囲は [0, A[0]-1]
	reach := A[0] - 1
	if reach >= N-1 {
		// 全部倒れる
		fmt.Println(N)
		return
	}

	// i=0 は最初から倒すので、i=1 から探索開始
	for i := 1; i <= reach && i < N; i++ {
		// i 番目のドミノが倒れるので、新しい右端候補は i + A[i] - 1
		newReach := i + A[i] - 1
		if newReach > reach {
			reach = newReach
			if reach >= N-1 {
				// 右端が配列末尾以降に達したら、全部倒れる
				fmt.Println(N)
				return
			}
		}
	}

	// reach は 0-index なので、倒れた本数は reach + 1
	fmt.Println(reach + 1)
}
