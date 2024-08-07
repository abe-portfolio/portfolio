// n
use proconio::input;

fn main() {
    input! {
        n: i32,
    };
}

/* ============================================================================== */

// a b
use proconio::input;

fn main() {
    input! {
        a: i32,
        b: i32,
    };
}

/* ============================================================================== */

// n
// v1 v2 ... vn
use proconio::input;

fn input2() {
    input! {
        n: i32,
        v: [i32; n],
    };
}

/* ============================================================================== */

// 文字列の標準入力
use proconio::input;

fn input4() {
    input! {
        S: String,
    };
}

/* ============================================================================== */

// n
// a1 b1
// a2 b2
// ...
// an bn
use proconio::input;

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

/* ============================================================================== */

// n
// a1
// a2
// ...
// an
use proconio::input;

fn main() {
    input! {
        n: usize,
        names: [String; n],
    }
}

/* ============================================================================== */

// a b
// c d

use proconio::input;

fn main() {
    input! {
        a: i32,
        b: i32,
        c: i32,
        d: i32,
    }
}