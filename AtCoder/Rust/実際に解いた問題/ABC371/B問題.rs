use proconio::input;

fn main() {
  input! {
        n: usize,
        m: usize,
    }

    let mut pairs = Vec::new();
    for _ in 0..m {
        input! {
            a: i32,
            b: char,
        }
        pairs.push((a, b));
    }
    
    let mut house = Vec::new();
    
    for (a, b) in &pairs {
      if *b == 'M' {
        if house.contains(&a) {
        println!("No");
          continue;
        }
        house.push(a);
        println!("Yes");
      } else {
        println!("No");
      }
    }
}

