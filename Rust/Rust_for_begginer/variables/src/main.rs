use rand::Rng;


fn main() {
    // 変数の宣言
    // let x: i32 = 5;  デフォルトで不変なので変更不可能
    let mut x: i32 = 5;
    println!("The value of x is {}", x);

    x= 6;
    println!("The value of x is {}", x);
    
    const CONSTANT: usize = 100;
    println!("The value of CONSTANT is {}", CONSTANT);

    // シャドーイング
    let y: i32 = 5; // 5
    let y: i32 = y + 1; // 6
    // Block　これによってScopeが作成される
    {
        let y: i32 = y * 2; //12
        let z: i32 = y * 2;
        println!("The value of y in the inner scope is {}",y); // 12
        println!("The value of z in the inner scope is {}",z); // 24
    }

    // println!("The value of z is {}", z); Scopeを抜けているのでエラーになる 
    println!("The value of y is {}", y); // 6


    // 白色の型ヒント（Rust-anlyzerの機能）に注目
    let some_strings = "aaa";
    println!("The value of some_strings is {}", some_strings); // aaa
    let some_strings = some_strings.len();
    println!("The value of some_strings is {}", some_strings); // 3


    // 異なる型同士の計算
    let a: usize = 6;
    let b: f64 = 1.5;
    // let c: <usize as Div<f64>>::Output = a / b; //そのままだとエラーになる（異なる型同士の計算はできない）
    let c = (a as f64) / b;
    println!("The value of c is {}", c); // 4


    // 文字列型 = char　ユニコードのスカラー値のため、ASCIIよりも多くも文字を表すことができる
    let char_1: char = 'a';
    let char_2: char = '例';
    let char_3: char = '❤';
    println!("The value of char_1 is {}", char_1); // a
    println!("The value of char_2 is {}", char_2); // 例
    println!("The value of char_3 is {}", char_3); // ❤


    // 複合型l
    // タプル型
    let tup: (i32, f64, u8) =(100, 6.4, 1);
    println!("The value of tup is {:?}", tup); // (100, 6.4, 1)
    let (v1, v2, v3) = tup;
    println!("The value of v1 is {}", v1); // 100
    println!("The value of v2 is {}", v2); // 6.4
    println!("The value of v3 is {}", v3); // 1

    // タプルの要素のインデックスでもアクセス可能
    let tup_index_0 = tup.0;
    let tup_index_1 = tup.1;
    let tup_index_2 = tup.2;
    println!("The value of tup_index_0 is {}", tup_index_0); // 100
    println!("The value of tup_index_1 is {}", tup_index_1); // 6.4
    println!("The value of tup_index_2 is {}", tup_index_2); // 1


    // 配列型　長さがコンパイル時に固定される　=>　スタック領域に確保される
    let hairetsu_1 = [1, 2, 3, 4, 5];
    println!("The value of hairetsu_1 is {:?}", hairetsu_1); // [1, 2, 3, 4, 5]

    let hairetsu_2 = [3; 5];
    println!("The value of hairetsu_2 is {:?}", hairetsu_2); // [3, 3, 3, 3, 3]

    // 配列の要素にアクセス
    let hairetsu_v1 = hairetsu_1[0];
    let hairetsu_v2 = hairetsu_1[1];
    println!("The value of hairetsu_v1 is {}", hairetsu_v1); // 1
    println!("The value of hairetsu_v2 is {}", hairetsu_v2); // 2
    
    // 要素数以上のインデックスにアクセスしようとするとpanicを起こしてコードを終了させる
    // let hairetsu_v5 = hairetsu_1[5]; 
    // println!("The value of hairetsu_v5 is {}", hairetsu_v5); // index out of bounds: the length is 5 but the index is 5


    // Rustではmain()より下に書いてあっても呼び出しが可能
    another_function();
    study_time(4, 'h'); // Today's study time is 4h
    
    let x = five();
    println!("The value of x is {}",x); // 5

    let x = plus_one(5);
    println!("The value of x is {}",x); // 6

    println!("--------------------------------------------------------------------------");

    //　制御フロー
    // if分
    let number: i32 = 6;
    if number < 5{
        println!("Condition was True.");
    } else {
        println!("Condition was False.");
    }

    // 常にTrueのif文　（if {} はダメ）
    if true {
        println!("only wrire true after for keyword");
    }

    let mut rnd = rand::thread_rng();
    let random_number: i32 = rnd.gen_range(0..100);
    if random_number % 5 == 0 {
        println!("random_number is devisible by 5");
    } else if random_number % 4 == 0 {
        println!("random_number is devisible by 4");
    } else if random_number % 3 == 0 {
        println!("random_number is devisible by 3");
    } else {
        println!("random_number is not devisible by 5,4 or 3");
    }

    // ifが文ではなく式の振る舞いをする例
    let condition: bool = true;
    let number: i32 = if condition { 5 } else { 6 };
    // let number: i32 = if condition { 5 } else { 'six' }; はエラー。同じ型でなければならない。
    println!("The value of number is {}", number); // 5

    // ループ系（Rustには3種類のループがある）
    //   -> loop ：無限ループを作成する。breakで抜ける。
    //   -> while：Trueの限り続くループを作成する。breakで抜ける。
    //   -> for  ：要素の値を見て処理を行うループを作成する。breakで抜ける。
    println!("==== loop ====");
    /*
    loop {
        println!("again!");  無限ループするのでコメント中
    }
     */
    'outline: loop {
        let random_number: i32 = rnd.gen_range(0..100);
        if random_number == 50 {
            break 'outline // 145行目まで抜ける
        }
        println!("The value of random_number is not 50. value is {}", random_number);
    }

    // While
    println!("==== while ====");
    let mut while_number = 3;
    while while_number != 0 {
        println!("The value of while_number is {}", while_number);

        while_number -= 1; // デクリメント
    }
    println!("Little Boy liftoff.");

    // for
    println!("==== for ====");
    let for_number: [i32; 5] = [10, 20, 30, 40, 50];
    for element in for_number {
        println!("The value of element is {}", element);
    }
    println!("---------- 0..5 ----------");
    for elem in 0..5 {
        // 0 <= elem < 5
        println!("The value of elem is {}", elem);
    }
    println!("---------- (0..5).rev() ----------");
    for elem in (0..5).rev() {
        // 5 > elem >= 0
        println!("The value of elem is {}", elem);
    }


}

fn another_function() {
    println!("This is another function!");
}

// 引数を受け取る例
fn study_time(howlong: i32, timeunit: char) {
    println!("Today's study time is {}{}", howlong, timeunit);
}

// 戻り値を返す場合の書き方（-> 戻り値の型）
fn five() -> i32 {
    5
}

// 引数も戻り値も持つ例
fn plus_one(x: i32) -> i32 {
    x + 1
}