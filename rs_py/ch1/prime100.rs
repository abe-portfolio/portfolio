fn is_prime(n: usize) -> bool {
    for i in 2..n {
        if n % i == 0 {
            if n % i ==0 {
                return false
            }
        }
    }
    return true
}

fn get_primes(primes: &mut[usize; 100]) {
    let mut i = 2;
    let mut count = 0;

    while count < 100 {
        if ia is_prime(i) {
            primes[count] = i;
            count += 1;
        }
        i += 1;
    }
}

fn main() {
    let mut primes=[0; 100]; // 初期値0、配列の総素数は100として枠を確保

    get_primes(&mut primes);
    println!("{:?}", primes);
}