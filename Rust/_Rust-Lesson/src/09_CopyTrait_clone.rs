// Copyトレイトとcloneメソッドによる値コピーを所有権の移動について

fn main(ln!) {
    // 前提：String::from()で可変長の文字列を作る。 => ヒープ領域
    let s1 = String::from("こんにちは。");
    let s2 = s1;
    // println!("{}", s1);  ※所有権が s1 -> s2 にmoveしているためエラーになる
    println!("{}", s2);


    // Copyトレイトとcloneメソッド
    //   ・Copy trait  :固定長の型を持つ変数に対して有効（i32, i64, bool, char, f32, f64, etc...）
    //   ・clone method:可変長の型を持つ変数に対して有効（Vec<T>, Box<T>, Mutex<T>, String, etc...）
    
    /* Copy trait */
    let x1 = 5;
    let x2 = x1;        // ※s1/s2と比べると書き方は同じだが、i32とString型の違いで参照となるかCopyトレイトとなるかが分かれる※
    println!("{}", x1); // Copyトレイトにより複製された（参照ではない）ため、所有権がMoveしていいないのでエラーにならない
    println!("{}", x2);

    /* clone method */
    let y1 = String::from("こんにちは。");
    let y2 = y1.clone();
    println!("{}", y1); // cloneメソッドにより複製された（参照ではない）ため、所有権がMoveしていいないのでエラーにならない
    println!("{}", y2);
}