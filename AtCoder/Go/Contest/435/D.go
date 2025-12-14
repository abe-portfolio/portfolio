//go:build ignore
// +build ignore

package main

import (
	"bufio"
	"fmt"
	"os"
	"strconv"
)

func nextInt(sc *bufio.Scanner) int {
	sc.Scan()
	n, _ := strconv.Atoi(sc.Text())
	return n
}

const INF = int(1e18) // とても大きい数（黒くされたことがない場合の目印）

// ===============================================================
// ①「SCC（強連結成分）」を求める関数
// ---------------------------------------------------------------
// SCC（強連結成分） とは、A から B に行けて、B から A にも戻れるということ
// 有向グラフの中で「お互いに行き来できる点の集まり」をまとめて1つのグループとして扱うための処理。
// 例：1→2→3→1 なら {1,2,3} が 1つのグループになる。
// ===============================================================
func scc(n int, g [][]int) ([]int, int) {
	// comp[v] = v が属しているグループ番号
	comp := make([]int, n)
	for i := range comp {
		comp[i] = -1
	}

	// ord[v] : DFS（深さ優先探索）で何番目に発見されたか
	// low[v] : そこからどれだけ戻れるか
	ord := make([]int, n)
	low := make([]int, n)
	for i := range ord {
		ord[i] = -1
	}

	var stack []int
	t := 0  // DFS（深さ優先探索） の “発見時刻”
	cc := 0 // 見つかった SCC の数（後で反転）

	// ---------------------
	// Tarjan の再帰 DFS　　　　*Tarjan法はDFSを使ってSCCを発見するアルゴリズム
	// ---------------------
	var dfs func(int) // 再帰関数を定義するために、先にdfsを定義しておく必要がある
	dfs = func(v int) {
		ord[v] = t
		low[v] = t
		t++
		stack = append(stack, v)

		// v→to の全ての辺を見る
		for _, to := range g[v] {
			if comp[to] != -1 {
				// すでにグループが決まっている場合は無視
				continue
			}
			if ord[to] == -1 {
				// まだ DFS で来ていないなら深く進む
				dfs(to)
				// 戻って来たら low を更新
				if low[to] < low[v] {
					low[v] = low[to]
				}
			} else {
				// すでに発見済みなら “戻れる” ので ord を使って low 更新
				if ord[to] < low[v] {
					low[v] = ord[to]
				}
			}
		}

		// 「自分がグループの根っこ」か？
		if low[v] == ord[v] {
			// スタックから v までのノードを 1 つのグループにする
			for {
				u := stack[len(stack)-1]
				stack = stack[:len(stack)-1]
				comp[u] = cc
				if u == v {
					break
				}
			}
			cc++
		}
	}

	// 全部の点で DFS を開始する
	for i := 0; i < n; i++ {
		if ord[i] == -1 {
			dfs(i)
		}
	}

	// グループ番号を反転（C++と合わせるため）
	for i := 0; i < n; i++ {
		comp[i] = cc - 1 - comp[i]
	}

	return comp, cc
}

// ===============================================================
// ここから main（問題の中心）
// ===============================================================
func main() {
	sc := bufio.NewScanner(os.Stdin)
	sc.Split(bufio.ScanWords)
	sc.Buffer(make([]byte, 0, 1024), 1<<25)

	N := nextInt(sc)
	M := nextInt(sc)

	// グラフ g を作る
	g := make([][]int, N)
	for i := 0; i < M; i++ {
		u := nextInt(sc) - 1
		v := nextInt(sc) - 1
		g[u] = append(g[u], v) // u→v の矢印
	}

	// -------------------------------------------
	// ② グラフを「SCC（強連結成分）」にまとめる
	// -------------------------------------------
	// comp[v] = v が属しているグループ番号
	// C = グループ総数
	// -------------------------------------------
	comp, C := scc(N, g)

	// fst[c] = 「SCC c が初めて黒くされた時のクエリ番号」
	// まだ黒くされていなければ INF のまま
	fst := make([]int, C)
	for i := range fst {
		fst[i] = INF
	}

	// クエリを読み込みつつ、黒化された時刻を記録
	Q := nextInt(sc)
	ty := make([]int, Q)
	vq := make([]int, Q)

	for i := 0; i < Q; i++ {
		ty[i] = nextInt(sc)
		vq[i] = nextInt(sc) - 1

		if ty[i] == 1 {
			c := comp[vq[i]] // v の属する SCC 番号
			// 「この SCC を初めて黒くした時刻」を記録
			if i < fst[c] {
				fst[c] = i
			}
		}
	}

	// ===============================================================
	// ③ SCC-DAG を構築する
	// 　　SCC 同士で矢印がどうつながっているかを見る
	// ===============================================================
	dag := make([][]int, C)
	for v := 0; v < N; v++ {
		cv := comp[v]
		for _, to := range g[v] {
			cu := comp[to]
			// SCC が違う時だけ、SCC-DAG に辺を貼る
			dag[cv] = append(dag[cv], cu)
		}
	}

	// ===============================================================
	// ④ DAG の子 → 親方向へ「黒化した最初時刻」を伝える
	//
	// ある SCC が早く黒化されたなら、
	// そこへたどり着ける SCC も “同じ時刻までに黒に到達できる”
	//
	// C++ の PER ループの再現
	// ===============================================================
	for i := C - 1; i >= 0; i-- {
		for _, to := range dag[i] {
			// 子 to が早く黒くされるなら、
			// 親 i も “早く黒に到達可能” となる
			if fst[to] < fst[i] {
				fst[i] = fst[to]
			}
		}
	}

	// ===============================================================
	// ⑤ クエリ 2 の答えを出す
	//
	// 「今のクエリ番号 i より先に黒になっていれば Yes」
	// ===============================================================
	for i := 0; i < Q; i++ {
		if ty[i] == 2 {
			c := comp[vq[i]]
			if fst[c] <= i {
				fmt.Println("Yes")
			} else {
				fmt.Println("No")
			}
		}
	}
}
