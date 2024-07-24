extern crate rand;
use rand::Rng;

fn main() {
    // ◆◆◆ ランダムな数値の生成 ◆◆◆
    for _num in 1..6 {
        // 1 ~ 10までの整数
        let rand_num = rand::thread_rng().gen_range(1, 11); // ★
        println!("The randam number {}", rand_num);
    }

    println!("-------------------");

    for _num in 1..6 {
        // 1.0 ~ 1.9までの少数
        let rand_num_f = rand::thread_rng().gen_range(1.1, 1.9); // ★
        println!("The randam number {}", rand_num_f);
    }
    // ★整数の場合と少数の場合で範囲指定の指定値が異なるので注意！

    println!("-------------------");

    // ◆◆◆ 配列からランダムな値を取り出す ◆◆◆
    let fruits = ["apple", "orange", "mango", "grape", "pine", "banana"];

    for _num in 1..6 {
        let rand_num_v = rand::thread_rng().gen_range(0, 6);
        println!("The randam value is {}", fruits[rand_num_v]);
    }

    println!("-------------------");

    // ◆◆◆ ランダムな文字列の生成 ◆◆◆
    let mut rand_alphabet_u: Vec<char> = vec![];
    let mut rand_alphabet_l: Vec<char> = vec![];

    // 10文字のランダムな文字列を生成
    for _num in 1..11 {
        // Unicode(ASCIIコード)は、A~Zは65~90、a~zは97~122、91~96及び123以降は記号
        let rand_str_u = rand::thread_rng().gen_range(65, 91);
        if let Some(rand_str_u) = std::char::from_u32(rand_str_u) {
            rand_alphabet_u.push(rand_str_u);
        }

        let rand_str_l = rand::thread_rng().gen_range(97, 123);
        if let Some(rand_str_l) = std::char::from_u32(rand_str_l) {
            rand_alphabet_l.push(rand_str_l);
        }
    }

    let alphabet_str_u: String = rand_alphabet_u.iter().collect::<String>();
    println!("The randam upper string is {}", alphabet_str_u);
    let alphabet_str_l: String = rand_alphabet_l.iter().collect::<String>();
    println!("The randam lower string is {}", alphabet_str_l);

    println!("-------------------");
}
