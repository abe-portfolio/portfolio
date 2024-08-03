// 時間超過して正解にはなっていない
//　いつかサンプルだけでも正常に動くようにしたい


use proconio::input;

fn main() {
    input! {
        n: usize,
        k: usize,
        mut a: [i32; n],
    }

    // 整数列aをソート
    a.sort();

    // bを作成する
    let mut b = a.clone();
    let remove_count = k / 2;

    // 先頭からremove_count個削除
    if remove_count > 0 {
        b.drain(..remove_count);
    }
    
    // 末尾からremove_count個削除
    let b_len = b.len();
    if remove_count > 0 && b_len > remove_count {
        b.drain((b_len - remove_count)..);
    }

    // xを計算する
    let x = if k % 2 == 0 {
        b[b.len() - 1] - b[0]
    } else {
        let remove_head_diff = b[b.len() - 2] - b[0];
        let remove_tail_diff = b[b.len() - 1] - b[1];
        remove_head_diff.min(remove_tail_diff)
    };

    println!("{}", x);
}
