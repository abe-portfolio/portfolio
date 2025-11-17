<?php
$array1 = [
    'Apple' => 'Red',
    'Banana' => 'Yellow',
    'Cherry' => 'Red',
];
$array2 = [
    'Peach' => 'Pink',
    'Orange' => 'Orange',
    'Apple' => 'Yellow',
];
// 連結演算子（+）による結合
$result = $array1 + $array2;
print_r($result);
/*
Array
(
    [Apple] => Red
    [Banana] => Yellow
    [Cherry] => Red
    [Peach] => Pink
    [Orange] => Orange
)
*/  

// array_merge()関数による結合
$result2 = array_merge($array1, $array2);
print_r($result2);
/*
Array
(
    [Apple] => Yellow    **$array2のAppleが優先される
    [Banana] => Yellow
    [Cherry] => Red
    [Peach] => Pink
    [Orange] => Orange
)
*/


/*
 連結演算子（+）とarray_merge()関数による結合の違い
    ->連結演算子（+）
        左の配列に右の配列のまだ存在しないキーだけを追加する
        ※ 既存のキーは上書きされない

    ->array_merge()関数
        左の配列と右の配列を結合して、新しい配列を返す
        ※ 既存のキーは上書きされる
*/

?>