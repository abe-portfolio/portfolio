fn main() {
    // 書式：  let 変数 = if 条件 { trueの時の値 } else { falseの時の値 };
    let x = 5;
    let n = if x % 2 == 0 { "偶数" } else { "奇数" };

    println!("{}", n);
}