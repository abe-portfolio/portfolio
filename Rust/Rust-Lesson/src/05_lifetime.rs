fn lt() {
    // lifetime managemen
    let mut lt:i32 = 1;
    println!("The memory address of lt is {:p}", lt);

    {
        // 参照元のltがmutなので、lt2は不変で定義する（let mut lt2で定義するとコンパイルエラーになる）
        let lt2: i32 = &lt;
        println!("The value of lt2 is {}", lt2);
        println!("The memory address of lt2 is {:p}", lt2);

        lt2 += 10;
        println!("The value of lt2 is {}", lt2);
        println!("The memory address of lt2 is {:p}", lt2);
    }
}

// ◆元の不変変数を参照先で可変の値にする
/*  let lt = 10;
    println!("{}", lt);   // 10

    let mut lt2 = lt;     // ※値コピーなので参照ではない
    println!("{}", lt2);  // 10
    lt2 = lt2 + 11;
    println!("{}", lt2);  // 21

    println!("{}", lt);   // 10
*/

// ∴不変で定義されたltを、可変で定義したlt2で「参照として」受け取ることは不可能（コンパイルエラー）
//　　-> よって、値コピーの形をとる

// ----------------------------------------------------------

// ◆元の可変変数を参照先で変更する
/*  let mut lt = 10;
    println!("{}", lt);   // 10

    let lt2 = &mut lt;    // ※参照元がmutなので、ここで可変として定義する必要がない（可変ステータスも参照して引き継ぐ）
    println!("{}", lt2);  // 10

    *lt2 = *lt2 + 5;
    println!("{}", lt2);  // 15

    println!("{}", lt);   // 15
*/
