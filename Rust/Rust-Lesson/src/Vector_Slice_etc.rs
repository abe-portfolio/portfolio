use std::collections::HashMap;


fn main() {
    println!("---------- １．配列 ----------");
    // １．配列
    //    -> "固定長"で"同じ型"の要素を格納
    let arr: [i32; 3] = [1, 2, 3];
    println!("{:?}", arr);


    println!("---------- ２．Vector ----------");
    // ２．Vector
    //    -> "可変長"で"同じ型"の要素を格納する
    //    -> letで不変の宣言も可能だが、不変のVectorを使うくらいなら配列で良い
    let mut vec: Vec<i32> = vec![1, 2, 3, 4, 5];
    println!("{:?}", vec);

    vec.push(6);             // Vectorの末端に要素を追加
    println!("{:?}", vec);   // vec![1, 2, 3, 4, 5, 6];

    vec.pop();               // Vectorの末端に要素を削除
    println!("{:?}", vec);   // vec![1, 2, 3, 4, 5];

    vec.remove(1);           // Vectorのインデックスが１の要素を削除
    println!("{:?}", vec);   // vec![1, 3, 4, 5, 6];

    vec.retain(|x| x != 3);  // 値が３以外の要素を残す
    println!("{:?}", vec);   // vec![1, 2, 4, 5, 6];
    

    println!("---------- ３．Slice ----------");
    // ３．Slice
    //    -> 配列やVectorの一部または全部を参照して使用したいときに利用
    //    -> サイズは実行時に確定するが、Slice本体のサイズは固定長である
    let arr_slice = &arr[1..4];  // 配列のインデックスが１～４の値を借用
    let vec_slice = &vec[2..];   // Vectorのインデックスが２以降の値を借用
    println!("{:?}", arr_slice);
    println!("{:?}", vec_slice);
    

    println!("---------- ４．tuple ----------");
    // ４．tuple
    //    -> "固定長"で"異なる型"の要素を格納する
    let tuple: (i32, f64, char) = (1, 2.0, 'a');
    println!("{:?}", tuple);
    
    
    println!("---------- ５．Box<T> ----------");
    //　５．Box<T>
    //    -> 配列をヒープ領域に作成する
    //    -> 配列は固定長なのでデフォルトでスタック領域に格納される
    let box_arr: Box<[i32]> = Box::new([1, 2, 3]);
    println!("{:?}", box_arr);
    
    
    println!("---------- ６．HashMap ----------");
    // ６．HashMap
    //    -> "可変長"の連想配列
    //    -> キーと値は異なる値でも良いが、キー同士/値同士は同じ型でなければならない
    // use std::collections::HashMap
    let mut contents = HashMap::new();
    contents.insert("Daniel", "789-1534");
    contents.insert("Nancy", "921-3194");
    contents.insert("Angel", "192-4910");
    contents.insert("Robert", "639-0293");
    println!("{:?}", contents);
}