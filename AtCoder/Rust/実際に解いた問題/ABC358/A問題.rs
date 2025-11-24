use proconio::input;

fn main() {
    input! {
        S: String,
        T: String,
    };
    
    if S == "AtCoder" && T == "Land" {
        println!("Yes");
    } else {
        println!("No");
    }
}