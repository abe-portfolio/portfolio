use proconio::input;

fn main() {
    input! {
        a: u8,
        b: u8,
        c: u8,
    };
    
    let result = if (b <= c && (a >= b && a < c)) || (b > c && (a >= b || a < c)) {
        "No"
    } else {
        "Yes"
    };

    println!("{}", result);
    
}