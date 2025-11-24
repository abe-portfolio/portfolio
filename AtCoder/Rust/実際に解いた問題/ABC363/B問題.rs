use proconio::input;

fn main() {
    input! {
        n: i32,
        t: i32,
        p: i32,
        mut l: [i32; n],
    };

    // 配列内の t 以上の値の個数をカウント
    let count = l.iter().filter(|&&x| x >= t).count() as i32;
    
    // 降順でソート
    l.sort_by(|a, b| b.cmp(a));
    let leftover = p - count;

    if count >= p {
        println!("0");
    } else if count == 0 {
        // leftover を usize に変換してインデックスに使用
        let result = t - l[(leftover as usize) - 1];
        println!("{}", result);
    } else {
        // leftover を usize に変換してインデックスに使用
        let result = t - l[leftover as usize];
        println!("{}", result);
    }
}
