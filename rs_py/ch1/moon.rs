fn main() {
    let moon = 2384400.0;
    let car = 80.0;
    let btrain = 300.0;

    println!("月まで車で{}日", moon/car/24.0);
    println!("月まで新幹線で{}日", moon/btrain/24.0);
}