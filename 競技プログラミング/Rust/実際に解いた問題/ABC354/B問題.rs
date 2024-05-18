use proconio::input;

fn main() {
    // 標準入力から名前の数を受け取る
    input! {
        n: i32,
    }

    // n個の名前と整数を受け取る
    let mut names = Vec::new();
    let mut total_num = 0;
    for _ in 0..n {
        input! {
            name: String,
            num: i32,
        }
        total_num += num;
        names.push(name);
    }
    
    // 辞書順にソート
    names.sort();
    
    // total_num MOD n
    // as usize;で計算結果(i32型)をusize型にしてresultに代入
    let result: usize = (total_num % n) as usize;
    
    // ソートされたnamesの各要素とそのインデックスを出力
    for (index, name) in names.iter().enumerate() {
        // インデックスがresultと等しい場合、その要素の値を出力
        if index == result {
            println!("{}",name);
        }
    }
}