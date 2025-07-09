<?php
/*  目次
1. isset
2. empty
3. var_dump
4. print_r
*/


// isset
// 変数が存在し、かつnullでないかどうかを確認
$data = 1;
$out = isset($data);
var_dump($out);
// 結果
// bool(true)



// empty
// 変数が空かどうかを確認
$data = "";
$out = empty($data);
var_dump($out);
// 結果
// bool(true)
// ※　$data = "　" の場合は、false



// var_dump
// 変数の型と値を詳細に出力
$data = 1;
var_dump($data);
// 結果
// int(1)



// print_r
// 変数の値を人間が読みやすい形式で出力
$data = [1, 2, 3];
print_r($data);
// 結果
// Array
// (    
//      [0] => 1
//      [1] => 2
//      [2] => 3
// )
?>