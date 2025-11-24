use proconio::input;

fn main() {
    input! {
        n: usize,
        h: [i32; n],
    };

    // 最初の要素を取得
    let h1 = h[0];

    // h1より大きい値のうち、最も左にある数のインデックスを取得
    let mut max_index = None;
    // h.iter()は、h配列のイテレータを生成。イテレータは、配列の要素を順番に返す。
    // enumerate()は、イテレータから (インデックス, 要素) のタプルを生成。つまり、各要素とそのインデックスを取得。
    // skip(1)は、最初の要素をスキップ。
    for (i, &x) in h.iter().enumerate().skip(1) {
        if x > h1 {
            max_index = Some(i);
            break;
        }
    }

    if let Some(index) = max_index {
        println!("{}", index + 1);
    } else {
        println!("-1");
    }
}
