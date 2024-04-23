use proconio::input;

// ABC001, ABC002, … , ABC314, ABC315, ABC317, ABC318, … , ABC348, ABC349
fn main() {
    input! {
        N: String
    };
    let len = N.len();
    let second_half = &N[len - 3..];
    let second_half_num: i32 = second_half.parse().expect("Failed to parse");
    
    if second_half_num > 0 && second_half_num < 316 {
        println!("{}", "Yes");
    } else if second_half_num > 316 && second_half_num < 350 {
        println!("{}", "Yes");
    } else {
        println!("{}", "No");
    };
}
