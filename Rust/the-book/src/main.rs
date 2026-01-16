mod tpl;
mod ary;
mod vec;
mod st;
mod box_pointer;

fn main() {
    // tuple
    tpl::run();
    println!(" ");

    // array
    ary::run();
    println!(" ");

    println!("*** 補足 ***");
    println!("tuple と array の違い:");
    println!(" - tuple は、'異なる型'の値をまとめることができる");
    println!(" - array は、'同じ型'の値をまとめることができる");
    println!("tuple と array の共通点:");
    println!(" - 値の変更：可能（let / let mut による）");
    println!(" - 値の追加：不可能");
    println!(" - 値の削除：不可能");
    println!(" - 値の型の変更：不可能");
    println!(" ");

    // Vec
    vec::run();
    println!(" ");

    // struct
    st::run();
    println!(" ");

    // Box pointer
    box_pointer::run();
    println!(" ");
}
