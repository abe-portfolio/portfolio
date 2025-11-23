use proconio::input;

fn main() {
    input! {
        s: String,
    }

    let bytes = s.as_bytes();
    let n = bytes.len();
    if n == 0 {
        println!("0");
        return;
    }

    let mut runs: Vec<(u8, i64)> = Vec::new();
    let mut cur = bytes[0];
    let mut len: i64 = 1;

    for &b in bytes.iter().skip(1) {
        if b == cur {
            len += 1;
        } else {
            runs.push((cur, len));
            cur = b;
            len = 1;
        }
    }
    runs.push((cur, len));

    let mut ans: i64 = 0;

    for i in 0..runs.len() - 1 {
        let (d1, l1) = runs[i];
        let (d2, l2) = runs[i + 1];
        if d2 == d1 + 1 {
            ans += l1.min(l2);
        }
    }

    println!("{}", ans);
}
