use proconio::input;

fn main() {
    input! {
        n: usize,
    };

    let mut previous_string = String::new();
    let mut current_string = String::new();
    let mut sweet_consecutive_count = 0;

    for i in 0..n {
        input! {
            s: String,
        };

        // 'sweet' の連続カウントを処理
        if s == "sweet" {
            sweet_consecutive_count += 1;
        } else {
            sweet_consecutive_count = 0; // 'sweet' 以外の場合、カウントリセット
        }

        // n-2回目までに 'sweet' が2回連続した場合
        if sweet_consecutive_count == 2 && i < n - 1 {
            println!("No");
            return;
        }

        previous_string = current_string;
        current_string = s;
    }

    // n-2回目とn-1回目のときに 'sweet' が連続した場合のみ 'Yes' を出力
    if current_string == "sweet" && previous_string == "sweet" {
        println!("Yes");
    } else {
        println!("Yes");
    }
}
