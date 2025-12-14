package problem

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
	S := nextInt(reader)

	cnt := 0
	// 全探索 O(N²)
	// i が N回、j が N回、合計で N² 回のループが実行される。よって計算量は O(N²)
	/*
		for i := 1; i <= N; i++ {
			for j := 1; j <= N; j++ {
				if i+j <= S {
					cnt++
				}
			}
		}
	*/

	// 高速化させた全探索 O(N)
	// i+j ≤ S は j ≤ S-i に式変形できる
	// j のとる範囲は、1≤j≤N(制約) かつ j≤S-i(式変形) → まとめると： 1≤j≤min(N, S-i)
	for i := 1; i <= N; i++ {
		upper := S - i
		if upper > N {
			upper = N
		}
		if upper > 0 {
			cnt += upper
		}
	}

	fmt.Println(cnt)
}

/*
N = 5, S = 6 の例

| i | j ≤ S-i | j が存在する数 |
|---|---------|--------------|
| 1 | 5       | 5            |
| 2 | 4       | 4            |
| 3 | 3       | 3            |
| 4 | 2       | 2            |
| 5 | 1       | 1            |
  ↑
  N

合計は 5+4+3+2+1 = 15。
よって、解は １５
*/
