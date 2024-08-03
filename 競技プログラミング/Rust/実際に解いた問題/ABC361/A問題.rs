use proconio::input;

fn main() {
    input! {
        n: usize,
        k: usize,
        x: i32,
        mut a: [i32; n],
    };
    
    if k < a.len() {
        a.insert(k, x);
    } else {
        a.push(x);
    }
    
    // 配列の出力形式を変更（[a, b, c, d] -> a b c d）
    let output: Vec<String> = a.iter().map(|x| x.to_string()).collect();
    println!("{}", output.join(" "));
}