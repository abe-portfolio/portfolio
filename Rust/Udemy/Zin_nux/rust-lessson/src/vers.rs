pub mod sub_a;
mod sub_b;

// fnだけだとデフォルトでPrivateのため、pubを付ける必要がある。
pub fn run() {
    println!("Here is vers module.");
    sub_a::func_a();
    sub_b::func_b();
}
