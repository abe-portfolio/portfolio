use proconio::input;

fn main() {
    input! {
        n: usize,
        names: [String; n],
    }

    let mut cnt = 0;
    for name in names {
        if name == "Takahashi" {
            cnt += 1;
        }
    }

    println!("{}", cnt);
}
