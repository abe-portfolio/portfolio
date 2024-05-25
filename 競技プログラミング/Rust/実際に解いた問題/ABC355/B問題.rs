use proconio::input;

fn main() {
    // 標準入力から n, m, 配列 a と b を読み取る
    input! {
        n: usize,
        m: usize,
        a: [i32; n],
        b: [i32; m],
    };
    
    // 配列 a と b をソートする
    let mut a_sorted = a.clone();
    let mut b_sorted = b.clone();
    a_sorted.sort();
    b_sorted.sort();

    // 新しい配列 c に a と b を結合し、ソートする
    let mut c = Vec::with_capacity(n + m);
    c.extend(&a);
    c.extend(&b);
    c.sort();

    // c の中で a の値が連続して2つ以上マッチする箇所があるかどうかを確認する
    let mut found = false;
    for i in 0..c.len() - 1 {
        if a.contains(&c[i]) && a.contains(&c[i + 1]) {
            found = true;
            break;
        }
    }

    // 結果を出力する
    if found {
        println!("Yes");
    } else {
        println!("No");
    }
}
