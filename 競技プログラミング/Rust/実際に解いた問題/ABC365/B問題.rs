use proconio::input;

fn main() {
    input! {
        n: usize,
        a: [i64; n],
    };

    if n < 2 {
        // 配列の要素が2つ未満の場合は、処理を終了します
        return;
    }

    let mut max1 = std::i64::MIN;
    let mut max2 = std::i64::MIN;
    let mut max1_index = 0;
    let mut max2_index = 0;

    for (i, &value) in a.iter().enumerate() {
        if value > max1 {
            max2 = max1;
            max2_index = max1_index;
            max1 = value;
            max1_index = i;
        } else if value > max2 {
            max2 = value;
            max2_index = i;
        }
    }

    // インデックスは0始まりなので、+1して出力します
    println!("{}", max2_index + 1);
}
