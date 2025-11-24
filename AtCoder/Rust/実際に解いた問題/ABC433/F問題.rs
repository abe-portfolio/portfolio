use proconio::input;

const MOD: i64 = 998244353;

fn mod_pow(mut a: i64, mut e: i64) -> i64 {
    let mut r = 1i64;
    while e > 0 {
        if e & 1 == 1 {
            r = r * a % MOD;
        }
        a = a * a % MOD;
        e >>= 1;
    }
    r
}

fn main() {
    input! {
        s: String,
    }

    let n = s.len();
    let bytes = s.as_bytes();

    let mut pos: Vec<Vec<usize>> = vec![Vec::new(); 10];
    for (i, &b) in bytes.iter().enumerate() {
        pos[(b - b'0') as usize].push(i);
    }

    let mut fact = vec![1i64; n + 1];
    let mut ifact = vec![1i64; n + 1];
    for i in 1..=n {
        fact[i] = fact[i - 1] * (i as i64) % MOD;
    }
    ifact[n] = mod_pow(fact[n], MOD - 2);
    for i in (0..n).rev() {
        ifact[i] = ifact[i + 1] * ((i + 1) as i64) % MOD;
    }

    let comb = |nn: usize, kk: usize, fact: &Vec<i64>, ifact: &Vec<i64>| -> i64 {
        if kk > nn { return 0; }
        fact[nn] * ifact[kk] % MOD * ifact[nn - kk] % MOD
    };

    let mut ans = 0i64;

    for d in 0..=8 {
        let p = &pos[d];
        let q = &pos[d + 1];
        let lp = p.len();
        let lq = q.len();
        if lp == 0 || lq == 0 { continue; }

        let mut p_ptr = 0usize;
        for (idx_q, &qpos) in q.iter().enumerate() {
            while p_ptr < lp && p[p_ptr] < qpos {
                p_ptr += 1;
            }
            let a = p_ptr;
            let b = lq - idx_q;
            if a >= 1 {
                let val = comb(a + b - 1, a - 1, &fact, &ifact);
                ans += val;
                if ans >= MOD { ans -= MOD; }
            }
        }
    }

    println!("{}", ans % MOD);
}
