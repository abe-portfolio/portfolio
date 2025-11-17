<?php
// 分割代入
$data = [1, 2, 3, 4, 5];
[$_, $a, $b, $c, $d] = $data;
print $a; // 2
print $b; // 3
print $c; // 4
print $d; // 5


// インデックス => 変数名 で特定の要素だけを分割代入で取り出せる（通常の配列）
$data2 = [1, 2, 3, 4, 5];
[1 => $a, 4 => $b] = $data2;
print $a; // 2
print $b; // 5


// キー -> 変数名 で特定のキーの要素だけを分割代入で取り出せる（連想配列）
$map = ['title' => '独習PHP', 'price' => 1000];
['title' => $title, 'price' => $price] = $map;
print $title; // 独習PHP
print $price; // 1000


// 入れ子の場合
$data3 = [1, 2, [3, 4, 5]];
[$a, $b, $c] = $data3;
print_r($a); // 1
print $b;    // 2
print_r($c); // Array ( [0] => 3 [1] => 4 [2] => 5 )

[$x, $y, [$z1, $z2, $z3]] = $data3;
print $x;  // 1
print $y;  // 2
print $z1; // 3
print $z2; // 4
print $z3; // 5


// 変数のスワッピング
$left = 'apple';
$right = 'banana';
[$left, $right] = [$right, $left];
print $left; // banana
print $right; // apple
?>