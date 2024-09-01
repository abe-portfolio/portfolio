use proconio::input;

fn main() {
    input! {
        p: char,
        q: char,
    };

    let v = vec![0, 3, 2, 8, 9, 14, 23];

    // p/q および 'A' はchar型。それを as usize でusize型に変換することでアルファベットをASCIIコードに変換できる(A=65,B=66...)
    // p/q は入力値（A~Gのどれか）、'A'はそのまま「A」である。
    // これらをASCIIコードに変換して引くことで入力された値が「A」のASCIIコード(65)からどれだけ離れているかを求めることができる。
    // 出力したいのはpとqの差である。
    println!("{}", (v[p as usize - 'A' as usize] - v[q as usize - 'A' as usize]).abs());
}