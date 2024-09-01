use proconio::input;

fn main() {
    input! {
        n: usize,
        k: usize,
        mut a: [i32; n],
    };

    // a.split_off(n - k)を使用して、aの後ろk枚を取り出し、新しいベクターto_moveに保持
    let to_move = a.split_off(n - k);
    // a.splice(0..0, to_move)を使用して、to_moveの要素をaの先頭に追加  -> ここでaの形を変えているためmutで受け取る
    a.splice(0..0, to_move);

    for card in a {
        print!("{} ", card);
    }
}
