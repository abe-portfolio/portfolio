use proconio::input;

fn main() {
  input! {
    n: i32,
    q: i32,
    v: [i32; q],
  };
  // println!("{}",n);
  // println!("{}",q);
  // println!("{:?}",v); // 配列の内容をすべて表示
  let mut count_map = std::collections::HashMap::new();

  // ハッシュマップを使って配列の各要素の出現回数をカウントする
  for &num in &v {
      let count = count_map.entry(num).or_insert(0);
      *count += 1;
  }

  // 偶数回出現する要素の数をカウントし、それをNから引く
  let mut result = 0;
  for (_, &count) in &count_map {
    if count % 2 == 1 {
      result += 1;
    }
  }

  println!("{}", n - result);
}
