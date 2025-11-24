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


/*
    赤色コーダーの回答

    【前提】
    a,bは標準入力から確定した値が渡される。
    この時、aとbの和によって作成できる等差数列の数が決まる。
        a == b -> 1通り
        (a + b)%2 -> 奇数の時、2通り
        (a + b)%2 -> 偶数の時、3通り


    fn main() {
        input! {
            a: u32,
            b: u32,
        }
        let ans = if a == b { 1 } else { 3 - (a + b) % 2) };
        println!("{}", ans);
    }
*/