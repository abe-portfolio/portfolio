use proconio::input;

fn main() {
    input! {
        // f32 でも「0 ≤ x ≤ 100」 の範囲の少数は受け取れるが、f64 の方が精度が高い
        x: f64,
    }

    // x を文字列に変換
    let mut result = x.to_string();

    // "."が含まれている場合、末尾の0を削除
    if result.contains('.') {
        // 末尾に 0 がある限り削除します。
        while result.ends_with('0') {
            result.pop();
        }
        // 最後の文字が"."であれば、それも削除（例：12. → 12）
        if result.ends_with('.') {
            result.pop();
        }
    }

    println!("{}", result);
}


// contains()やends_with()での指定方法について
/*
    １．文字リテラル（単一の一文字）であればシングルクォーテーション(')で指定する

    ２．文字列リテラル（複数の文字列）であればダブルクォーテーション("")で指定する


    例）
    let s = "example.txt";

    println!("{}", s.ends_with('t'));    // １：true
    println!("{}", s.ends_with(".txt")); // ２：true
*/