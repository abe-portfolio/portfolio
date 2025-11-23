use proconio::input;
use std::collections::HashMap;

fn digit(x: i64) -> usize {
    x.to_string().len()
}

fn main() {
    input! {
        n: usize,
        m: i64,
        a: [i64; n],
    }

    let mut p10 = vec![1_i64; 11];
    for d in 1..=10 {
        p10[d] = (p10[d - 1] * 10) % m;
    }

    let mut count: Vec<HashMap<i64, i64>> = vec![HashMap::new(); 11];

    for &x in &a {
        let x_mod = x % m;
        for d in 1..=10 {
            let key = (x_mod * p10[d]) % m;
            *count[d].entry(key).or_insert(0) += 1;
        }
    }

    let mut ans = 0_i64;

    for &x in &a {
        let x_mod = x % m;
        let d = digit(x);
        let need = (m - x_mod) % m;
        if let Some(&freq) = count[d].get(&need) {
            ans += freq;
        }
    }

    println!("{}", ans);
}
