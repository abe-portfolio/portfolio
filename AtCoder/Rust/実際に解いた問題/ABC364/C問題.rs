use proconio::input;

fn main() {
    input! {
        n: usize,
        x: i64,
        y: i64,
        a: [i64; n],
        b: [i64; n],
    };

    // ペアを作成し、Bの値で降順にソート
    let mut pairs: Vec<(i64, i64)> = a.iter().cloned().zip(b.iter().cloned()).collect();
    pairs.sort_by(|(a1, b1), (a2, b2)| {
        let sum1 = a1 + b1;
        let sum2 = a2 + b2;
        sum2.cmp(&sum1)
    });

    let mut sum_a = 0;
    let mut sum_b = 0;
    let mut count = 1;

    for (a_value, b_value) in pairs {
        sum_a += a_value;
        sum_b += b_value;
        
        // AまたはBの条件を満たした場合
        if sum_a >= x || sum_b >= y {
            println!("{}", count);
            return;
        }

        count += 1;
    }

    // すべてのペアを加算しても条件を満たさない場合
    println!("{}", count - 1);
}
