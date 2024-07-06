use proconio::input;

fn main() {
    input! {
        n: usize,
        colors: [i32; n*2],
    }
    
    let mut cnt = 0;
    for i in 0..n*2-2 {
        if colors[i] == colors[i+2] {
            cnt += 1;
        }
    }
    
    println!("{}", cnt);
}
