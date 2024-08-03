use proconio::input;

fn main() {
    input! {
        y: i32,
    };
    
    match (y % 4 == 0, y % 100 == 0, y % 400 == 0) {
        (false, _, _) => println!("365"),
        (true, false, _) => println!("366"),
        (true, true, false) => println!("365"),
        (true, true, true) => println!("366"),
    }
}
