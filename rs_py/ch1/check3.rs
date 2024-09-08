fn main() {
    for i in 1..=50 {
        if i % 3 == 0 || i.to_string().contains('3') {
            println!("A");
        } else {
            println!("{}", i);
        }
    }
}


// i.to_string().contains('3')
// i.to_string()                ->  i の値をの文字列に変換
//              .contains('3')  ->  文字列に変換された i の値に 3 が含まれるか判定