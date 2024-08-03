use proconio::input;

fn main() {
    input! {
        r: i32,
    };
    
    // match文で範囲で分ける場はrangeの書き方をする
    // 複雑の処理を記述する場合はブロック（{}）を使用する
    match r {
        0..=99 => {
            let mut diff = 100 - r;
            println!("{}", diff);
        },
        100..=199 => {
            let mut diff = 200 - r;
            println!("{}", diff);
        },
        200..=299 => {
            let mut diff = 300 - r;
            println!("{}", diff);
        },
        _ => {
            let mut diff = 400 - r;
            println!("{}", diff);
        },
    }
}