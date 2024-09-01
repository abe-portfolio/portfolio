use proconio::input;
use std::collections::BinaryHeap;

fn main() {
    input! {
        n: usize,
        mut a: [i32; n],
    };

    // 最大ヒープを作成する。ヒープはデフォルトで最大ヒープの特性を持つ。
    /*
       BinaryHeap 
        最大ヒープを提供するデータ構造。
        最大ヒープでは、最大値が常にルートに位置し、他の要素はその最大値に比べて小さくなる。
        このため、最大値を効率的に取り出すことができ、最大値の取得・削除・挿入といった操作にかかる時間が短くなる。
    */
    let mut heap = BinaryHeap::from(a);

    let mut cnt = 0;  // 操作回数のカウント

    // ヒープに2つ以上の要素がある限りループ
    while heap.len() > 1 {
        // 最大の2つの要素を取り出す
        let mut max1 = heap.pop().unwrap();  // 最も大きい要素
        let mut max2 = heap.pop().unwrap();  // 2番目に大きい要素

        // 最大の2つの要素を-1する
        max1 -= 1;
        max2 -= 1;

        // 減少させた要素が正の値であればヒープに再挿入
        if max1 > 0 {
            heap.push(max1);
        }
        if max2 > 0 {
            heap.push(max2);
        }

        cnt += 1;

        // ヒープに正の数が1つだけ残っているか確認
        let positive_count = heap.iter().filter(|&&x| x > 0).count();
        if positive_count == 1 {
            println!("{}", cnt);
            return;
        }
    }

    // ループ終了後の操作回数を出力
    println!("{}", cnt);
}
