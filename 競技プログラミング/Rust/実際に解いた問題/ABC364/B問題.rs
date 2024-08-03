use proconio::input;

fn main() {
    input! {
        n: usize,
        x: i64,
        y: i64,
        a: [i32; n],
        b: [i32; n],
    };

    // AとBのペアを作成し、(A, B)をタプルとして保存
    let mut pairs: Vec<(i32, i32)> = a.iter().cloned().zip(b.iter().cloned()).collect();

    // ペアをAの値で降順に並び替え（Aの値が大きい順）
    pairs.sort_by(|(a1, _), (a2, _)| a2.cmp(&a1));

    let mut sum_a = 0;
    let mut sum_b = 0;
    let mut count = 1; // 初期値を1に設定

    for (a_value, b_value) in pairs {
        sum_a += a_value;
        sum_b += b_value;
        
        // AまたはBの条件を満たした場合
        if sum_a >= x || sum_b >= y {
            println!("{}", count);
            return;
        }

        count += 1; // カウントをインクリメント
    }

    // すべてのペアを加算しても条件を満たさない場合
    println!("{}", count-1);
}
