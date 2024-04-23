use proconio::input;

fn main() {
    input! {
        // 変数名: 型 i32など
        N: i32,
    };
}

// n
// v1 v2 ... vn
fn input2() {
    input! {
        n: i32,
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