use proconio::input;

fn main() {
    input! {
        mut a: i32,
        mut b: i32,
    };
    
    // aがbより大きい場合は値を入れ替える
    if a > b {
        std::mem::swap(&mut a, &mut b);
    }
    
    let mut count = 0;
    
    if a != b {
        // ケース1: x, a, b の順
        let x1 = 2 * a - b;
        if x1.is_integer() {
            count += 1;
        }
        
        // ケース2: a, x, b の順
        if (a + b) % 2 == 0 {
            let x2 = (a + b) / 2;
            if x2.is_integer() {
                count += 1;
            }
        }
        
        // ケース3: a, b, x の順
        let x3 = 2 * b - a;
        if x3.is_integer() {
            count += 1;
        }
        
        println!("{}", count);
    } else {
        // a と b が等しい場合
        println!("1");
    }
}

// is_integer メソッドを提供するトレイトを追加
trait IsInteger {
    fn is_integer(&self) -> bool;
}

impl IsInteger for f64 {
    fn is_integer(&self) -> bool {
        self.fract() == 0.0
    }
}

impl IsInteger for i32 {
    fn is_integer(&self) -> bool {
        true
    }
}
