use proconio::input;

fn third_largest(a: i32, b: i32, c: i32) -> &'static str {
    let mut nums = vec![a, b, c];
    nums.sort();
    if nums[1] == a {
      return "A";
    } else if nums[1] == b {
      return "B";
    } else {
      return "C";
    }
}


fn main() {
    input! {
        ab: String,
        ac: String,
        bc: String,
    };
    
    let mut flg_a = 5;
    let mut flg_b = 5;
    let mut flg_c = 5;
    
    if ab == "<" {
      flg_b += 1;
    } else {
      flg_a += 1;
    }
    
    if ac == "<" {
      flg_c += 1;
    } else {
      flg_a += 1;
    }
    
    if bc == "<" {
      flg_c += 1;
    } else {
      flg_b += 1;
    }
    
    
    let result = third_largest(flg_a, flg_b, flg_c);
    println!("{}", result);
}
