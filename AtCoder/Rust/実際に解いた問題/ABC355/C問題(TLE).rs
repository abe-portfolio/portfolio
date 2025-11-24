use proconio::input;

fn main() {
    // 標準入力から n, t, 配列 a を読み取る
    input! {
        n: usize,
        t: usize,
        a: [i32; t],
    };

    // n行n列のビンゴカードを生成
    let mut bingo_card = vec![vec![0; n]; n];
    for i in 0..n {
        for j in 0..n {
            bingo_card[i][j] = (i * n + j + 1) as i32;
        }
    }

    // ビンゴカードのマークを保持するためのベクタ
    let mut marked = vec![vec![false; n]; n];

    // ビンゴをチェックするための関数
    fn check_bingo(marked: &Vec<Vec<bool>>, n: usize) -> bool {
        // 行をチェック
        for i in 0..n {
            if (0..n).all(|j| marked[i][j]) {
                return true;
            }
        }

        // 列をチェック
        for j in 0..n {
            if (0..n).all(|i| marked[i][j]) {
                return true;
            }
        }

        // 斜め（左上から右下）をチェック
        if (0..n).all(|i| marked[i][i]) {
            return true;
        }

        // 斜め（右上から左下）をチェック
        if (0..n).all(|i| marked[i][n - 1 - i]) {
            return true;
        }

        false
    }

    // 選択された値に基づいてビンゴカードをマークし、ビンゴをチェック
    let mut bingo_turn = -1;
    for turn in 0..t {
        let num = a[turn];
        for i in 0..n {
            for j in 0..n {
                if bingo_card[i][j] == num {
                    marked[i][j] = true;
                }
            }
        }
        if check_bingo(&marked, n) {
            bingo_turn = (turn + 1) as i32; // 1-based index
            break;
        }
    }

    println!("{}", bingo_turn);
}
