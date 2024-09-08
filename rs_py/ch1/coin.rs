fn main() {
    let price: i32 = 3950;

    for i500 in 0..11 {
        for i100 in 0..5 {
            for i50 in 0..11 {
                let total = i50 * 50 + i100 * 100 + i500 * 500;

                if price == total {
                    println!("500円x{}+100円x{}+50円x{}={}", i500, i100, i50, total);
                }
            }
        }
    }
}