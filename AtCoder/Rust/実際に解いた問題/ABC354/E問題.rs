// AC 15
// WA 15


use proconio::input;

fn main() {
    // 標準入力からカードの数を受け取る
    input! {
        n: usize,
    };

    // カードの情報を受け取る
    let mut cards = Vec::new();
    for _ in 0..n {
        input! {
            a: i64,
            b: i64,
        };
        cards.push((a, b));
    }

    // ゲームをシミュレートして、先手と後手を判定
    let mut user_1_turn = true;
    while !cards.is_empty() {
        let mut removed = false;
        for i in 0..cards.len() {
            let (current_a, current_b) = cards[i];
            if cards.iter().any(|&(a, b)| (a == current_a || b == current_b) && (a != current_a || b != current_b) && (a == b || a != current_a) && (a != b || b != current_b)) {
                cards.remove(i);
                removed = true;
                break;
            }
        }
        if !removed {
            break;
        }
        user_1_turn = !user_1_turn; // ターンを交代する
    }

    // 最後にカードのペアを取り除けた人を出力
    if user_1_turn {
        println!("Takahashi");
    } else {
        println!("Aoki");
    }
}
