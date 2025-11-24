use proconio::input;

fn main() {
    input! {
        x: i64,
        y: i64,
        z: i64,
    }

    // 通常ケース (Z > 1)
    let numerator = x - z * y;       // 分子 (x - Z*y)
    let denominator = z - 1;         // 分母 (Z - 1)

    // t が整数かつ 0以上か判定
    if denominator != 0
        && numerator % denominator == 0
        && numerator / denominator >= 0
    {
        println!("Yes");
    } else {
        println!("No");
    }
}
