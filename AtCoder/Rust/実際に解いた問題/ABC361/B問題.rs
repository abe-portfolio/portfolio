use proconio::input;

fn main() {
    input! {
        a: isize,
        b: isize,
        c: isize,
        d: isize,
        e: isize,
        f: isize,
        g: isize,
        h: isize,
        i: isize,
        j: isize,
        k: isize,
        l: isize,
    };

    // 各軸の範囲を計算
    let (x1_min, x1_max) = (a.min(d), a.max(d));
    let (y1_min, y1_max) = (b.min(e), b.max(e));
    let (z1_min, z1_max) = (c.min(f), c.max(f));

    let (x2_min, x2_max) = (g.min(j), g.max(j));
    let (y2_min, y2_max) = (h.min(k), h.max(k));
    let (z2_min, z2_max) = (i.min(l), i.max(l));

    // 各軸で重なりがあるかをチェック
    let overlap_x = x1_min < x2_max && x1_max > x2_min;
    let overlap_y = y1_min < y2_max && y1_max > y2_min;
    let overlap_z = z1_min < z2_max && z1_max > z2_min;

    if overlap_x && overlap_y && overlap_z {
        println!("Yes");
    } else {
        println!("No");
    }
}
