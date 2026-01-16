// const name: string  これはコンパイルエラー。定数宣言時には値も必要
const name: string = "melchior"; 
// const name: string = "casper";　これもコンパイルエラー。同じ定数に対する２度目の宣言は不可。

fn main() {
    // 毎回letで初期化すれば更新可能
    let a: i32 = 1;
    let a: i32 = 2;
    let a: i32 = 3;
    // ※メモリアドレスはすべて異なる

    // 不変定数として宣言
    let b: i32 = 1;
    // b = 2;  コンパイルエラー
    // b = 3;  コンパイルエラー

    // 可変定数として宣言
    let mut c: i32 = 1;
    c: i32 = 2;
    c: i32 = 3;
    // ※メモリアドレスは全て同じ


}