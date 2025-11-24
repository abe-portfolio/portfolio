use proconio::input;

fn main() {
    input! {
        n: usize,
        a: i32,
        t: [i32; n],
    };

    // 初めに t[0] + a を出力する
    let mut prev_max = t[0] + a;
    println!("{}", prev_max);

    // 2番目以降のステップを処理する(インデックスにアクセスするのでforの終端値n = n-1でt[i] == t[n-1]に等しい)
    for i in 1..n {
        // 現在のステップでの最大値を計算する(std::cmp::max()関数　->　2つの引数を取り、それらのうち大きい値を返す)
        let current_max = std::cmp::max(prev_max + a, t[i] + a);

        // 現在の最大値を出力し、prev_max を更新する
        println!("{}", current_max);
        prev_max = current_max;
    }
}
