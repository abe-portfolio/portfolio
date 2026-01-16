#[derive(Debug)]
struct Rectangle {
    width: u32,
    height: u32,
}

// impl を使用するメリット:
// 下記の例では area メソッドしか記述していないが、今後 メソッドが増える時に、
// Rectangle 構造体（データ型）に紐づくメソッドをこの impl ブロック配下に集約できることがメリット。
impl Rectangle {
    fn area(&self) -> u32 {
        self.width * self.height
    }

    // fn another_method(&self) {
    //     // 追加のメソッドをここに定義できる
    // }
}

pub fn run(){
    println!("---------- struct ----------");
    println!("struct は、複数の関連した値をまとめ、名前付けできる独自のデータ型");

    let rect1 = Rectangle { width: 30, height: 50 };

    println!("struct Rectangle: {:#?}", &rect1);
    println!(
        "The area of the rectangle is {} square pixels.",
        // area(&rect1). => impl 実装前の記述（area 関数の引数として rect1 の参照を渡している）
        rect1.area()
    );
}

// impl 実装前の記述（fn areaをシンプルな関数として定義）
// fn area(rectangle: &Rectangle) -> u32 {
//     rectangle.width * rectangle.height
// }