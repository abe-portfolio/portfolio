use proconio::input;

// n
fn main() {
    input! {
        n: i32,
    };
}


// a b
fn main() {
    input! {
        a: i32,
        b: i32,
    };
}

// n
// v1 v2 ... vn
fn input2() {
    input! {
        n: i32,
        // n: usize,  usizeは符号なし整数　※絶対値をとるわけではないので、-2などを渡すとコンパイルエラーになる
        v; [i32; n]
    };
}

// n
// v_1 v_2 ... v_n
fn input3() {
    input! {
        n: usize,
        v: [i32; n],
    };
}

// 文字列の標準入力
fn input4() {
    input! {
        S: String,
    };
}

// n
// a1 b1
// a2 b2
// ...
// an bn
fn input5() {
    input! {
        n: i32,
    };

    for _ in 0..n {
        input! {
            a: String,
            b: i32,
        };
    }
}