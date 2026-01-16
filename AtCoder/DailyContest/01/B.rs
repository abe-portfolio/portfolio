use proconio::input;

fn main() {
    input! {
        abc: i32,
    };
    
    let a = abc / 100;
    let b = (abc / 10) % 10;
    let c = abc % 10;
    
    let ans = (100*a + 10*b + c)
            + (100*b + 10*c + a)
            + (100*c + 10*a + b);
    
    println!("{}", ans);
}