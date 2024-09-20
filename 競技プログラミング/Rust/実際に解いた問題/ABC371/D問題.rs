use proconio::input;

fn main() {
    input! {
        n: usize,
        x: [i32; n],
        p: [i32; n],
        q: usize,
    }
    
    // 座標と人数をまとめて格納し、座標でソート
    let mut villages: Vec<(i32, i32)> = x.iter().zip(p.iter()).map(|(&x, &p)| (x, p)).collect();
    villages.sort_by_key(|&(x, _)| x); // 座標に基づいてソート
    
    // 累積和を作成
    let mut prefix_sum = vec![0; n + 1];
    for i in 0..n {
        prefix_sum[i + 1] = prefix_sum[i] + villages[i].1;
    }
    
    // クエリの処理
    for _ in 0..q {
        input! {
            l: i32,
            r: i32,
        }
        
        // l および r の位置を二分探索で決定
        let l_idx = villages.binary_search_by_key(&l, |&(x, _)| x).unwrap_or_else(|i| i);
        let r_idx = villages.binary_search_by_key(&(r + 1), |&(x, _)| x).unwrap_or_else(|i| i) - 1;

        // r_idx の範囲外チェック
        let r_idx = r_idx.min(n - 1);
        
        // l_idx の範囲外チェック
        let l_idx = l_idx.min(n - 1);

        // 範囲が無効な場合は 0 を出力
        let sum = if r_idx >= l_idx {
            // 範囲が有効な場合のみ計算
            prefix_sum[r_idx + 1] - prefix_sum[l_idx]
        } else {
            0
        };
        
        println!("{}", sum);
    }
}
