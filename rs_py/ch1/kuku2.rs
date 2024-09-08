// クロージャを使用した例

fn main() {
    for j in 1..10 {
        let i = (1..10).map(|x| format!("{:3}", i * j)).collect::<Vec<String>>().join(",");
        println!("{}", s);
    }
}