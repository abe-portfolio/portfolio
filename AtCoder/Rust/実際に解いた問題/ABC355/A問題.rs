use proconio::input;

fn main() {
    input! {
        a: i32,
        b: i32,
    };
    
    let all_numbers = [1, 2, 3];

    if a == b {
        println!("-1");
    } else  {
        for &number in &all_numbers {
            if number != a && number != b {
                println!("{}", number);
                break;
            }
        }
    }
}