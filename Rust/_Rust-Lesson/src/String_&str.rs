// Rustにおける文字を扱う型について

/*
    char型
        -> １文字の文字を扱う

    String型
        -> "可変長"の文字列をヒープ領域に格納
        -> String::new();         空の文字列を作成し、ヒープ領域に格納する
        -> String::from("Hello"); 文字列を作成し、ヒープ領域に格納する
    
    &str型
        -> 固定長の文字列であり、所有権を借用するため読み取り専用となる
        -> スタック領域に格納されるため、letで宣言する
            ※&str型にlet mutは使用できない
                OK -- let s: &str = "Hello";
                NG -- let mut s: &str = "Hello";
    
    【可変な文字列の宣言】
        let mut s: String = String::from("Hello");  // ヒープ領域

    【不変な文字列の宣言】
        let s: String = String::from("Hello");  // ヒープ領域
        let s: &str = "Hello";                  // スタック領域
*/


// 以下に、なんらかの処理(change())で返された値を今後の処理を使いたいが
// 予期しない値の変更というリスクを排除するために所有権の借用を利用する

fn change(string: String) -> String {
    let result: String = string + " World!";
    return result
}

fn main() {
    // １．空の文字列を可変であるString型で定義（戻り値によって文字列サイズが変わっても対応できるようにするため）
    let mut s: String = String::from("Hello");

    // ２．なんらかの処理(change())の戻り値を文字列sに追加する
    s.push_str(change(s));

    // ３．&str型の変数ssに借用してバインドすることで読み取り専用の安全な値として扱う
    let ss: &str = &s;

    println!("{}", ss);
}