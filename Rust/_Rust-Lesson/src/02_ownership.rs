// ownership = 所有権だけど、参照系をメインでまとめる

fn main() {
    // ノートの「letとlet mutとconst」を参照
    let i:i32 = 1;
    println!("The value of i is {}", i);
    println!("The memory address of i is {:p}", &i);
    {
        // ブロックを作成してスコープを明示的に記載する
        let i:i32 = 100;
        println!("The value of i is {}", i);
        println!("The memory address of i is {:p}", &i);
    }
    println!("The value of i is {}", i);
    println!("The memory address of i is {:p}", &i);
}