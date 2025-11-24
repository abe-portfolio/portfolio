use proconio::input;
use std::collections::HashMap;

fn main() {
    input! {
        n: usize,
    };

    // `L`と`R`の最新の値を保持する変数
    let mut last_seen: HashMap<String, i32> = HashMap::new();
    // 合計値
    let mut total_sum = 0;

    for _ in 0..n {
        input! {
            a: i32,
            s: String,
        };

        // `s` の値が "L" または "R" であることを保証する
        if let Some(&prev_value) = last_seen.get(&s) {
            // 前回の値が存在する場合、絶対値の差を計算し、合計値に加算
            total_sum += (a - prev_value).abs();
        }

        // 現在の値を記録しておく
        last_seen.insert(s, a);
    }

    println!("{}", total_sum);
}
