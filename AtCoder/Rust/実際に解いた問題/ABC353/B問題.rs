use proconio::input;

fn main() {
    // 標準入力からn, k, aを受け取る
    input! {
        n: usize,  // 待機しているグループ数
        k: i32,    // 乗り物に乗れる人数
        a: [i32; n],  // 各グループの人数
    };

    // 空席の数を追跡する変数を初期化し、アトラクションの発射回数をカウントする変数を初期化する
    let mut remaining_seats = k;
    let mut launches = 0;

    // 各グループを順番に処理する
    for group in a {
        // 現在の空席数がグループの人数以上であれば、そのグループを乗せる
        if remaining_seats >= group {
            remaining_seats -= group;  // 空席数を減らす
        } else {
            // 空席数が足りない場合は、アトラクションを発射し、空席数をリセットする
            launches += 1;  // アトラクションの発射回数を増やす
            remaining_seats = k - group;  // 空席数を乗り物の定員数から現在のグループの人数を引いた値にリセットする
        }
    }

    // 最後のグループを乗せた後にアトラクションを発射する必要があるかどうかをチェックし、発射回数をカウントする
    if remaining_seats < k {
        launches += 1;
    }

    // アトラクションの発射回数を出力する
    println!("{}", launches);
}
