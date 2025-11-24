use proconio::input;

fn main() {
    input! {
        n: usize,
    };

    let mut last_t = 0;
    let mut diff_t = 0;
    let mut val = 0;

    for _ in 0..n {
        input! {
            t: i32,
            v: i32,
        };
        
        if last_t == 0 {
          val = v;
          last_t = t;
        } else {
          diff_t = t - last_t;
          last_t = t;
          
          val = std::cmp::max(0, val - diff_t);
          val = val + v;
        }
    }
    
    println!("{}", val);
}