pub fn run() {
    println!("---------- array ----------");
    println!("array は、複数の値のコレクションを得ることができるが、tuple とは異なり配列の全要素は、 同じ型でなければならない");

    // 月のように固定の要素数を持つデータに便利（stuck領域にデータ格納される）
    let months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    ];
    println!("Array: {:?}", months);
    println!(" ");


    let a: [i32; 5] = [1, 2, 3, 4, 5];
    println!("let a: [i32; 5] = [1, 2, 3, 4, 5];");
    println!("Array a: {:?}", a);
    println!(" ");


    let b = [3; 5];
    println!("let b = [3; 5];");
    println!("Array b: {:?}", b);
}