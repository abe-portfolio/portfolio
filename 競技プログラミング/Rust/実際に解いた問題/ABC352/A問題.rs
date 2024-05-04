use proconio::input;

fn is_in_range(x: i32, y: i32, z: i32) -> bool {
    if x < y {
        // x < y の場合、z が x より大きくかつ y より小さい場合に true を返す
        z > x && z < y
    } else {
        // x >= y の場合、z が y より大きくかつ x より小さい場合に true を返す
        z > y && z < x
    }
}


fn main() {
    input! {
        _n: i32,
        x: i32,
        y: i32,
        z: i32,
    };
    
    if is_in_range(x, y, z) {
        println!("{}", "Yes");
    } else {
        println!("{}", "No");
    }
}