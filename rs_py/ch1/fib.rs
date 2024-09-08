fn main() {
    let mut a: i32 = 1;
    let mut b: i32 = 1;

    println!("{}", a);
    println!("{}", b);

    for _ in 0..31 {
        println!("{}", a + b);

        let tmp: i32 = a;
        a = b;
        b = tmp + a;
    }
}