/*
与えられた条件下で、正の約数をちょうど 9 個持つ数を効率的に求めるには、次のようなアプローチを取ります：

アルゴリズムの考え方
１．正の約数の個数の性質
　・数値 x の約数の個数を 𝑑(𝑥) とします。
　・例えば、36 の約数は 1,2,3,4,6,9,12,18,36 の 9 個です。
　・約数の個数は、数を素因数分解した結果から計算できます。
　・もし 𝑥=𝑝1^𝑒1⋅𝑝2^𝑒2⋯𝑝𝑘^𝑒𝑘（𝑝 は素数、e は指数）で表せるなら、約数の個数は次の式で求められます：
        𝑑(𝑥)=(𝑒1+1)⋅(𝑒2+1)⋅…⋅(𝑒𝑘+1)

２．約数が 9 個の数の条件
　・d(x)=9 になる条件は次のどちらか：
        x が形p^8を持つ（素数pの8乗）
        x が形 𝑝1^2⋅𝑝2^2を持つ（異なる素数p1,p2の積）。

３．効率的な探索
  ・𝑥≤𝑁 の条件を満たすすべての 𝑝^8 と 𝑝1^2⋅𝑝2^2を列挙します。
  ・計算量を削減するため、必要な範囲の素数を事前に計算します（エラトステネスの篩などを使用）。
*/



use proconio::input;
use std::collections::HashSet;

fn count_numbers_with_9_divisors(n: u64) -> usize {
    let mut primes = vec![];
    let mut is_prime = vec![true; (n as f64).sqrt() as usize + 1];
    
    // エラトステネスの篩で素数を列挙
    for i in 2..is_prime.len() {
        if is_prime[i] {
            primes.push(i as u64);
            let mut multiple = i * i;
            while multiple < is_prime.len() {
                is_prime[multiple] = false;
                multiple += i;
            }
        }
    }
    
    let mut results = HashSet::new();
    
    // p^8 を計算
    for &p in &primes {
        let p8 = p.pow(8);
        if p8 > n {
            break;
        }
        results.insert(p8);
    }
    
    // p1^2 * p2^2 を計算
    for i in 0..primes.len() {
        let p1_square = primes[i].pow(2);
        if p1_square > n {
            break;
        }
        for j in (i + 1)..primes.len() {
            let p2_square = primes[j].pow(2);
            if p1_square * p2_square > n {
                break;
            }
            results.insert(p1_square * p2_square);
        }
    }
    
    results.len()
}

fn main() {
    input! {
        n: u64,
    };
    let result = count_numbers_with_9_divisors(n);
    println!("{}", result);
}
