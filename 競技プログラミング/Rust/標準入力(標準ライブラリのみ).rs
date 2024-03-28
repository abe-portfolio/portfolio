// 前提知識：Rustは行単位または行含め全体[]かでしか読み込めないため半角スペース区切りもまとめて受け取る
//             -> 行単位：std::io::stdin().read_line()
//             -> 全体　：std::fs::read_to_string()

// 空白区切りの整数を２つ受け取る
// split_whitespace()で文字列を空白文字（スペース、タブ、改行など）で分割
// map()は動き的にはPythonのmap関数と同様(概念レベルでは異なるが、気にしないことにする)
// parse::<i32>() は文字列を整数に変換するメソッド
// unwrap() はパースに失敗した場合にプログラムをクラッシュさせる（正確には Result 型が Ok の場合はその値を返すが、Err の場合にその中身を取り出しプログラムをパニックさせる）
fn get_2_number() {
    let (a, b) = {
        let mut s = String::new();
        std::io::stdin().read_line(&mut s).unwrap();
        let mut iter = s.split_whitespace().map(|i| i.parse::<i32>().unwrap());
        (iter.next().unwrap(), iter.next().unwrap())
    };

    println!("{} {}", a, b);
}


// 空白区切りの整数を３つ受け取る
fn get_3_number() {
    let (a, b, c) = {
        let mut s = String::new();
        std::io::stdin().read_line(&mut s).unwrap();
        let mut iter = s.split_whitespace().map(|i| i.parse::<i32>().unwrap());
        (iter.next().unwrap(), iter.next().unwrap(), iter.next().unwrap())
    };

    println!("{} {} {}", a, b, c);
}


// 空白区切りの文字列を受け取る
// .trim()で前後の空白を削除する
// .to_string()メソッドでstring型にする
fn get_string() {
    let str = {
        let mut s = String::new();
        std::io::stdin().read_line(&mut s).unwrap();
        s.trim().to_string();
    };

    println!("{}", str);
}

