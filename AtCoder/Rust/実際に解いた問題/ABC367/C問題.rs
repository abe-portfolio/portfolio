use proconio::input;
use itertools::Itertools; // itertoolsクレートを使用して全ての組み合わせを生成

fn main() {
    input! {
        n: u8,
        k: i32,
        r: [i32; n as usize],
    };

    // 各位置 i における要素の範囲を `[1, Ri]` から全ての組み合わせを生成するための準備
    // `r` の各要素 `Ri` に基づき、数列の各位置で取り得る値の範囲を決定
    // 例: r = [3, 4] の場合、位置 1 には 1, 2, 3 のいずれか、位置 2 には 1, 2, 3, 4 のいずれかを持つ
    // .map() メソッドは、イテレータの各要素に対してクロージャ（無名関数）を適用し、その結果を新しいイテレータとして返
    // .collect() メソッドは、イテレータの要素を収集して新しいコレクション（この場合はVector）を作成
    // Vec<_> はVectorを定義する際に肩を指定するのではなく、型推論を使用する場合の書き方
    let ranges: Vec<_> = r.iter().map(|&ri| 1..=ri).collect();

    // 数列の候補を格納するベクター
    let mut sequences = Vec::new();

    // `ranges` に格納された各位置の範囲に基づいて全ての組み合わせを生成
    // `multi_cartesian_product` メソッドを使用することで、各位置に対する全ての可能な値の組み合わせが得られます
    // 例: ranges = [1..=3, 1..=4] の場合、全組み合わせは (1,1), (1,2), (1,3), (1,4), (2,1), ..., (3,4) となる
    for combination in ranges.into_iter().multi_cartesian_product() {
        // `combination` は現在の数列を表します。全ての位置に対して値が決まった状態です
        // 生成された数列の総和を計算
        let sum: i32 = combination.iter().sum();

        // 総和が `k` の倍数であるかをチェック
        // 条件に合う数列だけを `sequences` ベクターに追加
        if sum % k == 0 {
            sequences.push(combination);
        }
    }

    // 条件に合う数列を`sort_by` メソッドを使用して、辞書順にソート
    // 辞書順では、数列の最初の異なる要素で比較し、最も小さい順列が先に来るようにします
    // |a, b| はクロージャ（無名関数）
    sequences.sort_by(|a, b| a.cmp(b));

    // 条件に合う数列を出力
    // 各数列をスペースで区切った形式で出力します
    for seq in sequences {
        // `seq` は現在の数列を表します
        // `iter` で数列の各要素にアクセスし、`to_string` で文字列に変換し、`join(" ")` でスペースで結合
        println!("{}", seq.iter().map(ToString::to_string).collect::<Vec<_>>().join(" "));
    }
}
