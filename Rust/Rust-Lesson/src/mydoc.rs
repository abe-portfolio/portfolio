// バインドと参照・参照外し
fn bind() {
    let _a = 10;
    // a = 11;  
    
    let mut b = 10;
    let c = &mut b;
    *c = 11;
    println!("c:{c}");  // c:11
}