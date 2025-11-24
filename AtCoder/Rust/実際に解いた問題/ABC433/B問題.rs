use proconio::input;

fn main() {
    input! {
        n: usize,
        a: [i32; n],
    }

    for i in 0..n {
        let mut ans = -1;

        // 左側を右から左へ調べる
        for j in (0..i).rev() {
            if a[j] > a[i] {
                ans = (j + 1) as i32; // 人番号は1-index
                break;
            }
        }

        println!("{}", ans);
    }
}
