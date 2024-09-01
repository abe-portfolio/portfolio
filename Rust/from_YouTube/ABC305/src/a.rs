use proconio::input;

fn main() {
    input! {
        n: i32,
    };

    // (0..=100).step_by(5) によって、0から100までの5の倍数（0, 5, 10, ..., 100）を生成するイテレータを作成
    // min_by_key メソッドを使って、5の倍数の中から n に最も近い数値を選ぶ。
    // unwrap() は、min_by_key が返す Option 型から値を取り出すためのメソッド
    println!("{}",(0..=100).step_by(5).min_by_key(|x| (x - n).abs()).unwrap());
}