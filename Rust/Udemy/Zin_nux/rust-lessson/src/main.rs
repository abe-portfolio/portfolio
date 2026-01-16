mod vers;

fn main() {
    println!("---------------------- main start ----------------------");
    vers::run();
    println!();
    vers::sub_a::func_a();
    println!();
    // vers::sub_b::func_b();  // vers.rsにモジュールを取り込む際に mod か pub mod による取り込みの差

    println!("---------------------- main end ----------------------");
}
