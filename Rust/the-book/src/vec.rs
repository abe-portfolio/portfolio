pub fn run() {
    println!("---------- Vec ----------");
    println!("Vec は、複数の値のコレクションを得ることができ、配列とは異なり要素数を動的に変更できる");

    let mut v: Vec<i32> = Vec::new();
    println!("Vec v: {:?}", v);
    v.push(5);
    println!("Vec v: {:?}", v);
    v.push(6);
    println!("Vec v: {:?}", v);
    v.push(7);
    println!("Vec v: {:?}", v);
}