use proconio::input;

fn main() {
    input! {
        n: usize,
        a: [i32; n],
    };

    // dp[i] は i 番目までのターンでの最大経験値
    let mut dp = vec![0; n + 1];
    let mut prev_exp = vec![0; n + 1]; // 前回の経験値の保存

    let mut kill_count = 0;

    for i in 1..=n {
        let exp = a[i - 1];
        // exp_gain を初期化
        let exp_gain;

        // 経験値の計算
        if kill_count >= 2 {
            exp_gain = if kill_count % 2 == 0 { exp * 2 } else { exp };
        } else {
            exp_gain = exp; // kill_count < 2 の場合はそのままの経験値
        }

        // 更新前の経験値
        let current_max = dp[i - 1];

        // 経験値の計算
        let escape_exp = current_max;
        let kill_exp = prev_exp[i - 1] + exp_gain;

        // 最大経験値の選択
        dp[i] = escape_exp.max(kill_exp);

        // 経験値選択の出力
        let (action, gain) = if dp[i] == kill_exp {
            ("Killed", exp_gain)
        } else {
            ("Escaped", 0)
        };

        // 前回の経験値の保存
        prev_exp[i] = dp[i];
        
        // キルカウントの更新
        if action == "Killed" {
            kill_count += 1;
        }
    }

    println!("{}", dp[n]);
}
