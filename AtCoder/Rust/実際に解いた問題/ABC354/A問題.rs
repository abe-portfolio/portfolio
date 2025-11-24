use proconio::input;

fn main() {
    input! {
        H: i32,
    };
    
    let mut day = 1;
    let mut hight = 1;
    loop{
        if hight > H {
            println!("{day}");
            break;
        }
        day += 1;
        hight = hight * 2 +1;
    }
}