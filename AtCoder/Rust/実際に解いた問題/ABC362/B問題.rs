use proconio::input;

fn main() {
    input! {
        xa: i32,
        ya: i32,
        xb: i32,
        yb: i32,
        xc: i32,
        yc: i32,
    };
    
    let vertex_A = [xa, ya];
    let vertex_B = [xb, yb];
    let vertex_C = [xc, yc];
    
    if is_right_triangle(vertex_A, vertex_B, vertex_C) {
        println!("Yes");
    } else {
        println!("No");
    }
}

fn distance_squared(p1: [i32; 2], p2: [i32; 2]) -> i32 {
    let dx = p1[0] - p2[0];
    let dy = p1[1] - p2[1];
    dx * dx + dy * dy
}

fn is_right_triangle(a: [i32; 2], b: [i32; 2], c: [i32; 2]) -> bool {
    let ab2 = distance_squared(a, b);
    let bc2 = distance_squared(b, c);
    let ca2 = distance_squared(c, a);

    // ピタゴラスの定理(a** + b** = C**)を使用
    ab2 + bc2 == ca2 || ab2 + ca2 == bc2 || bc2 + ca2 == ab2
}
