package problem

import (
	"bufio"
	"fmt"
	"os"
	"strconv"
)

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
	M := make([]int, N)
	for i := 0; i < N; i++ {
		M[i] = nextInt(reader)
	}

	// ---------------- DP（動的計画法） ----------------
	// 状態 (State)の定義
	dp := make([]bool, S+1) // 何も選ばない０も含めるためS＋1になっている（Sの範囲は制約上１が最小）
	// 初期値 (Initial Value)の設定
	dp[0] = true

	// 遷移 (Transition)の実行
	for _, v := range M { // スライスA の値をひとつずつ使う（インデックスは使わないので _ で受け取る）
		for x := S - v; x >= 0; x-- {
			if dp[x] { // 合計xが作れる場合
				dp[x+v] = true // 合計x+vが作れる
			}
		}
	}

	fmt.Println(map[bool]string{true: "Yes", false: "No"}[dp[S]])
}

/*
そもそもDP（動的計画法）とは？

DP（動的計画法）とは、問題を小さな部分問題に分割して、それらの解を組み合わせて最適解を求める手法です。
DPは、問題を分割して解くことで、全探索よりも効率的に解を求めることができます。

DPの特徴
1. 分割した部分問題の解を組み合わせて最適解を求める
2. 部分問題の解を組み合わせることで、最適解を求める
3. 部分問題の解を組み合わせることで、最適解を求める

例：
配列Aの要素を使用して合計１０を作れるか？　（大きな問題）
Aの最後の値が３だとしたら、合計７が作れれば、そこに３を足した１０が作れることになる。
つまり、 「10 を作れるか？」 は、 「10−A[i] が作れるか？」 が分かれば判断できる。


DP を実装するには以下の３つが必要。
    １. 状態 (State)
	2. 初期値 (Initial Value)
	3. 遷移 (Transition)
*/
