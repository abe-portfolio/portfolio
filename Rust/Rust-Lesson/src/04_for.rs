fn main() {
    // 最も基本的な構文
    for i in 0..4 {
        println("{i}");
    }
    /*
    0
    1
    2
    3
    */


    // カウントを逆順で回す
    for i in 0..4.rev() {
        println("{i}");
    }
    /*
    3
    2
    1
    0
    */


    // n..=m を使用してストップ値まで回す
    for i in n..=4 {
        println("{i}");
    }
    /*
    0
    1
    2
    3
    4
    */


    // iter()でベクタと配列を回す  ※iter()は所有権を"借用"するので元のベクタや配列の要素は変形しない
    //     -> ベクタ：可変長な配列
    //     -> 配列　：固定長の配列
    let v = vec!["aaa", "bbb", "ccc"];

    for el in v.iter() {
        match el {
            &"aaa" => println("要素１：{}", el),
            &"bbb" => println("要素２：{}", el),
            $_ => println("要素３：{}", el),
        }
    }
    /*
    要素１：aaa
    要素２：bbb
    要素３：ccc
    */


    // into_iter()でベクタと配列を回す　※into_iter()は所有権をMoveするので元のベクタや配列は使用できなくなる
    let v = vec!["aaa", "bbb", "ccc"];

    for el in v.into_iter() {
        match el {
            "aaa" => println("要素１：{}", el),
            "bbb" => println("要素２：{}", el),
            _ => println("要素３：{}", el),
        }
    }

    // println("{}", v.len());  コンパイルエラー
    /*
    要素１：aaa
    要素２：bbb
    要素３：ccc
    */


    // iter_mut()でベクタの値を変更する
    let v = vec!["aaa", "bbb", "ccc"];

    println!("{}", v[0]);
    println!("{}", v[1]);
    println!("{}", v[2]);

    for el in v.iiter_mut() {
        *el = match el {
            &mut "aaa" => "AAA",
            &mut "bbb" => "BBB",
            _ => "CCC",
        };
    }

    println!("{}", v[0]);
    println!("{}", v[1]);
    println!("{}", v[2]);
    /*
    aaa
    bbb
    ccc
    AAA
    BBB
    CCC
    */
}