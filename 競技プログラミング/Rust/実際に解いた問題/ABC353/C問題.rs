use proconio::input;

const MOD: i64 = 100000000;

fn main() {
    input! {
        n: usize,
        a: [i64; n],
    };

    let mut sum = 0;

    // 各要素同士の和を求め、10の8乗で割った余りを計算して総和を求める
    for i in 0..n {
        for j in (i + 1)..n {
            sum += (a[i] + a[j]) % MOD;
        }
    }

    println!("{}", sum);
}

// 実行時間超過によりACにならず
// 16行目の処理を改善することで速度超過を回避できるのではないか？