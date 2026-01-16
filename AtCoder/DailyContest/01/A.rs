use proconio::input;

fn main() {
    input! {
        a: i32,
        b: i32,
    };
    
    
    let result = if a == b { -1 }  else { 6-(a+b) };
    println!("{}", result);
}