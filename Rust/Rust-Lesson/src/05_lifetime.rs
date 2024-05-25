fn lt() {
    // lifetime managemen
    let mut lt:i32 = 1;
    println!("The memory address of lt is {:p}", lt);

    {
        let lt2: i32 = &lt;
        println!("The value of lt2 is {}", lt2);
        println!("The memory address of lt2 is {:p}", lt2);

        lt2 += 10;
        println!("The value of lt2 is {}", lt2);
        println!("The memory address of lt2 is {:p}", lt2);
    }
}

