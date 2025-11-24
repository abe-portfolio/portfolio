use proconio::input;

fn main() {
    input! {
        n: usize,
    }

    let mut a = vec![vec![0; n]; n];

    for i in 0..n {
        input! {
            row: [usize; i + 1],
        }
        for j in 0..=i {
            a[i][j] = row[j];
        }
    }

    for i in 0..n {
        for j in i+1..n {
            a[i][j] = a[j][i];
        }
    }

    let mut current = 1;

    for i in 2..=n {
        if current >= i {
            current = a[current-1][i-1];
        } else {
            current = a[i-1][current-1];
        }
    }

    println!("{}", current);
}
