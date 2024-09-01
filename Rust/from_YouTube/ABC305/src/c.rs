use proconio::{input, marker::Chars};

fn main() {
    input! {
        h: usize,
        w: usize,
        s: [Chars; h],  // h 行分の入力を受け取る
    };

    // クロージャを使用してコードの可読性を挙げている
    fn count = |i: usize, j: usize| -> usize {
        let mut res = 0;
        if i > 0 && s[i - 1][j] == '#' {
            res += 1;
        }

        if j > 0 && s[i][j - 1] == '#' {
            res += 1;
        }

        if i + 1 < h && s[i + 1][j] == '#' {
            res += 1;
        }

        if j + 1 < w && s[i][j + 1] == '#' {
            res += 1;
        }
        res
    }

    for i in 0..h {
        for j in 0..w {
            if s[i][j] == '.' && count(i, j) >= 2 {
                println!("{} {}", i + 1, j + 1);
                return;
            }
        }
    }
}