//go:build ignore
// +build ignore

package main

import (
	"bufio"
	"fmt"
	"os"
	"sort"
	"strconv"
)

func nextInt(scanner *bufio.Scanner) int {
	scanner.Scan()
	n, _ := strconv.Atoi(scanner.Text())
	return n
}

func divisors(x int64) []int {
	d := []int{}
	for i := int64(1); i*i <= x; i++ {
		if x%i == 0 {
			d = append(d, int(i))
			if i*i != x {
				d = append(d, int(x/i))
			}
		}
	}
	return d
}

func main() {
	reader := bufio.NewScanner(os.Stdin)
	reader.Split(bufio.ScanWords)

	N := nextInt(reader)
	A := make([]int, N)
	for i := 0; i < N; i++ {
		A[i] = nextInt(reader)
	}

	// 値ごとの出現位置リスト
	pos := make(map[int][]int)
	for i, v := range A {
		pos[v] = append(pos[v], i) // スライスposの末尾にスライスAのインデックスを要素（value）として追加
	}

	pref := make([]int64, N+1)
	for i := 0; i < N; i++ {
		pref[i+1] = pref[i] + int64(A[i]) // int64(A[i])　　　　明示的に64bitのint型にネスト
	}

	var ans int64

	for l := 0; l < N; l++ {
		for r := l; r < N; r++ {
			// A[l..r] の和（>0 想定）
			sum := pref[r+1] - pref[l] // prefのindexとAのindexは1ずれているため、r+1とlを使う

			// ds は　[]int型の約数のリスト
			ds := divisors(sum)

			ok := true
			for _, d := range ds {
				// 値 d が出てくるインデックス達（[]int）　　。
				// pos にキー d が登録されているか？
				ps, exist := pos[d]
				if !exist {
					continue
				}
				// ps の中に区間 [l,r] に d があるか判定
				idx := sort.SearchInts(ps, l)
				if idx < len(ps) && ps[idx] <= r {
					ok = false
					break
				}
			}
			if ok {
				ans++
			}
		}
	}

	fmt.Println(ans)
}
