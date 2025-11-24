use proconio::input;
use std::cmp::min;

fn main() {
    input! {
        r: i32,
        g: i32,
        b: i32,
        c: String,
    };
    
    if c == "Red" {
        let smaller = min(g, b);
        println!("{}", smaller);
    } else if c == "Green" {
        let smaller = min(r, b);
        println!("{}", smaller);
    } else {
        let smaller = min(r, g);
        println!("{}", smaller);
    }
}


// min()は2つの数値を比較して小さい方を返す
// 等しい場合でもエラーは返さない