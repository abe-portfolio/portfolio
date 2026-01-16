pub fn run() {
    println!("---------- tuple ----------");
    println!("tuple は、複数の値をまとめて一つの値として扱うことができるデータ型");

    let tup: (i32, f64, u8) = (500, 6.4, 1);
    let (x, y, z) = tup;

    println!("tuple: {:?}", tup);
    println!("The value of x is: {}", x);
    println!("The value of y is: {}", y);
    println!("The value of z is: {}", z);
}