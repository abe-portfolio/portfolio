use proconio::input;

fn find_start_indices(s: &str, t: &str) -> Vec<usize> {
    let mut indices = Vec::new();
    let mut last_index = 0;

    for c in s.chars() {
        // 前回のインデックスから探索を開始
        if let Some(index) = t[last_index..].chars().position(|x| x == c) {
            // 見つかった場合、次の探索の開始位置を更新
            last_index += index + 1;
            indices.push(last_index);
        }
    }
    indices
}

fn main() {
    input! {
        s: String,
        t: String,
    };

    let indices = find_start_indices(&s, &t);
    // 配列の出力[a, b, c, d]をa b c dと出力するように修正
    println!("{}", indices.iter().map(|&x| x.to_string()).collect::<Vec<String>>().join(" "));
}
