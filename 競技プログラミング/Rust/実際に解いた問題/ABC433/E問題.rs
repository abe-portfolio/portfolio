use proconio::input;

fn main() {
    input! { t: usize }

    for _ in 0..t {
        input! {
            n: usize,
            m: usize,
            x: [i64; n],
            y: [i64; m],
        }

        let k = (n as i64) * (m as i64);
        let ku = k as usize;

        'case: {
            // 必要条件
            if *x.iter().max().unwrap() != k || *y.iter().max().unwrap() != k {
                println!("No");
                break 'case;
            }

            // 値→行/列（配列で持つ）
            let mut row_of = vec![usize::MAX; ku + 1];
            let mut col_of = vec![usize::MAX; ku + 1];

            for (i, &v) in x.iter().enumerate() {
                if v < 1 || v > k { println!("No"); break 'case; }
                let vu = v as usize;
                if row_of[vu] != usize::MAX { println!("No"); break 'case; } // 重複
                row_of[vu] = i;
            }
            for (j, &v) in y.iter().enumerate() {
                if v < 1 || v > k { println!("No"); break 'case; }
                let vu = v as usize;
                if col_of[vu] != usize::MAX { println!("No"); break 'case; } // 重複
                col_of[vu] = j;
            }

            // 行/列を最大値降順で並べる
            let mut row_order: Vec<usize> = (0..n).collect();
            row_order.sort_by_key(|&i| -x[i]);
            let mut col_order: Vec<usize> = (0..m).collect();
            col_order.sort_by_key(|&j| -y[j]);

            let mut a = vec![vec![0i64; m]; n];
            let mut used = vec![false; ku + 1];

            // 1) X∩Y（両方にある値）を大きい順に交点へ
            let mut both = Vec::new();
            for v in 1..=ku {
                if row_of[v] != usize::MAX && col_of[v] != usize::MAX {
                    both.push(v as i64);
                }
            }
            both.sort_by(|p, q| q.cmp(p)); // 降順

            for v in both {
                let vu = v as usize;
                let r = row_of[vu];
                let c = col_of[vu];
                if a[r][c] != 0 { println!("No"); break 'case; }
                a[r][c] = v;
                used[vu] = true;
            }

            // 2) Xのみ
            let mut x_only: Vec<i64> = x.iter().cloned()
                .filter(|&v| col_of[v as usize] == usize::MAX)
                .collect();
            x_only.sort_by(|p, q| q.cmp(p));

            for v in x_only {
                let vu = v as usize;
                let r = row_of[vu];
                let mut placed = false;
                for &c in &col_order {
                    if y[c] > v && a[r][c] == 0 {
                        a[r][c] = v;
                        used[vu] = true;
                        placed = true;
                        break;
                    }
                }
                if !placed { println!("No"); break 'case; }
            }

            // 3) Yのみ
            let mut y_only: Vec<i64> = y.iter().cloned()
                .filter(|&v| row_of[v as usize] == usize::MAX)
                .collect();
            y_only.sort_by(|p, q| q.cmp(p));

            for v in y_only {
                let vu = v as usize;
                let c = col_of[vu];
                let mut placed = false;
                for &r in &row_order {
                    if x[r] > v && a[r][c] == 0 {
                        a[r][c] = v;
                        used[vu] = true;
                        placed = true;
                        break;
                    }
                }
                if !placed { println!("No"); break 'case; }
            }

            // 4) 残り値と空きセルを埋める（limit降順×値降順）
            let mut rest_vals = Vec::new();
            for v in 1..=ku {
                if !used[v] { rest_vals.push(v as i64); }
            }
            rest_vals.sort_by(|p, q| q.cmp(p));

            let mut empties = Vec::new();
            for r in 0..n {
                for c in 0..m {
                    if a[r][c] == 0 {
                        let limit = x[r].min(y[c]);
                        empties.push((limit, r, c));
                    }
                }
            }
            empties.sort_by(|p, q| q.0.cmp(&p.0));

            if rest_vals.len() != empties.len() {
                println!("No");
                break 'case;
            }

            for i in 0..rest_vals.len() {
                let v = rest_vals[i];
                let (limit, r, c) = empties[i];
                if v >= limit { println!("No"); break 'case; }
                a[r][c] = v;
            }

            // 出力
            println!("Yes");
            for r in 0..n {
                for c in 0..m {
                    if c > 0 { print!(" "); }
                    print!("{}", a[r][c]);
                }
                println!();
            }
        }
    }
}
