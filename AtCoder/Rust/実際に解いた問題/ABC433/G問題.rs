use proconio::input;

#[derive(Clone)]
struct State {
    next: [i32; 26],
    link: i32,
    len: i32,
}

fn solve(s: &str) -> bool {
    // 会然→SAM 構築
    let mut st = Vec::new();
    st.push(State { next: [-1; 26], link: -1, len: 0 });
    let mut last = 0;

    for c in s.chars() {
        let cidx = (c as u8 - b'a') as usize;
        let cur = st.len() as i32;

        st.push(State {
            next: [-1; 26],
            link: 0,
            len: st[last].len + 1,
        });

        let mut p = last as i32;
        while p != -1 && st[p as usize].next[cidx] == -1 {
            st[p as usize].next[cidx] = cur;
            p = st[p as usize].link;
        }

        if p == -1 {
            st[cur as usize].link = 0;
        } else {
            let q = st[p as usize].next[cidx];
            if st[p as usize].len + 1 == st[q as usize].len {
                st[cur as usize].link = q;
            } else {
                let clone = st.len() as i32;
                st.push(State {
                    next: st[q as usize].next,
                    link: st[q as usize].link,
                    len: st[p as usize].len + 1,
                });

                while p != -1 && st[p as usize].next[cidx] == q {
                    st[p as usize].next[cidx] = clone;
                    p = st[p as usize].link;
                }

                st[q as usize].link = clone;
                st[cur as usize].link = clone;
            }
        }

        last = cur as usize;
    }

    let nstates = st.len();

    // out-degree を数える（遷移できる手が何個あるか）
    let mut outdeg = vec![0; nstates];
    for v in 0..nstates {
        for c in 0..26 {
            if st[v].next[c] != -1 {
                outdeg[v] += 1;
            }
        }
    }

    // 逆遷移リスト作る
    let mut prev = vec![Vec::new(); nstates];
    for v in 0..nstates {
        for c in 0..26 {
            let to = st[v].next[c];
            if to != -1 {
                prev[to as usize].push(v);
            }
        }
    }

    // -1: 未確定, 0: losing, 1: winning
    let mut state = vec![-1i8; nstates];
    use std::collections::VecDeque;
    let mut q = VecDeque::new();

    // out-degree 0 → losing
    for v in 0..nstates {
        if outdeg[v] == 0 {
            state[v] = 0;
            q.push_back(v);
        }
    }

    // トポロジカル順に確定
    while let Some(v) = q.pop_front() {
        let stv = state[v];
        for &p in &prev[v] {
            if state[p] != -1 {
                continue;
            }
            if stv == 0 {
                // 子が losing → 親は winning
                state[p] = 1;
                q.push_back(p);
            } else {
                // 子が winning → この親の outdeg を減らす
                outdeg[p] -= 1;
                if outdeg[p] == 0 {
                    state[p] = 0;
                    q.push_back(p);
                }
            }
        }
    }

    // start state（0）が勝ちなら Alice
    state[0] == 1
}

fn main() {
    input! {
        t: usize,
    }
    for _ in 0..t {
        input! {
            s: String,
        }
        if solve(&s) {
            println!("Alice");
        } else {
            println!("Bob");
        }
    }
}
