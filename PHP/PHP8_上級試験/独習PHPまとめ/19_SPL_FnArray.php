<?php
$data1 =['山田','田中','佐藤','鈴木','高橋'];
$data2 =[
    ['X-1','X-2','X-3'],
    ['Y-1','Y-2','Y-3'],
    ['Z-1','Z-2','Z-3'],
];

// count：配列の要素数を取得
print count($data1); // 5
print count($data2); // 3   *多次元配列の場合は、要素数を取得できない
print count($data2, COUNT_RECURSIVE); // 12   親配列に格納されている配列（３つ）＋各子配列の要素数（９つ）＝　１２


// array_countvalues：配列の要素の出現数を取得
$data3 = ['apple','banana','cherry','apple','banana','cherry'];
print array_count_values($data3); // ['apple'=>2, 'banana'=>2, 'cherry'=>2]


// array_merge：配列を結合
$data4 = [1, 3, 5];
$data5 = [2, 4, 6];
print array_merge($data4, $data5); // [1, 3, 5, 2, 4, 6]


// implode：配列を文字列に結合
print implode('と', $data1); // 山田と田中と佐藤と鈴木と高橋


// array_push：配列の末尾に要素を追加
// array_pop：配列の末尾から要素を削除
// array_unshift：配列の先頭に要素を追加
// array_shift：配列の先頭から要素を削除
$data6 = [1, 2, 3, 4, 5];
array_push($data6, 6);
print $data6; // [1, 2, 3, 4, 5, 6]  *末尾に追加
array_pop($data6);
print $data6; // [1, 2, 3, 4, 5]     *末尾から削除
array_unshift($data6, 0);
print $data6; // [0, 1, 2, 3, 4, 5]  *先頭に追加
array_shift($data6);
print $data6; // [1, 2, 3, 4, 5]     *先頭から削除


// array_splice：配列の要素を削除または置換
$fruits = ["Apple", "Banana", "Cherry", "Date", "Elderberry"];
// 要素を削除する
array_splice($fruits, 1, 2); // ["Banana", "Cherry"]     *２番目から２つの要素を削除する
print_r($fruits);
/*
Array
(
    [0] => Apple
    [1] => Date
    [2] => Elderberry
)
*/

// 要素を挿入する
array_splice($fruits, 1, 0, ["Blueberry", "Coconut"]);
print_r($fruits);
/*
Array
(
    [0] => Apple
    [1] => Blueberry
    [2] => Coconut
    [3] => Date
    [4] => Elderberry
)
*/

// 要素を置換する
array_splice($fruits, 1, 2, ["Fig", "Grape"]);
print_r($fruits);
/*
Array
(
    [0] => Apple
    [1] => Fig
    [2] => Grape
    [3] => Date
    [4] => Elderberry
)
*/
// 注意
// print_r(array_splice(...))とすると、削除された要素が返される


// array_slice：配列の一部を返す
print_r(array_slice($data1, 2, 2)); // [佐藤, 鈴木]     *２番目から２つの要素を返す


// in_array：配列に指定した要素が含まれているかどうかを判定
print in_array('佐藤', $data1); // true
print in_array('高市', $data1); // false


// sort：配列を昇順にソート
$data7 = [3, 1, 4, 1, 5, 9, 2, 6, 5, 3, 5];
print_r(sort($data7)); // [1, 1, 2, 3, 3, 4, 5, 5, 5, 6, 9]

// rsort：配列を降順にソート
print_r(rsort($data7)); // [9, 6, 5, 5, 5, 4, 3, 3, 2, 1, 1]


// usort：配列をユーザー定義の比較関数でソート
$keys = [
    '十', '百', '千', '万', '億', '兆', '京', '垓', '秭', '穣', '溝', '澗',
    '正', '載', '極', '恒河沙', '阿僧祇', '那由他', '不可思議', '無量大数'
];
$data8 = ['那由多', '京', '垓', '億', '無量大数'];
usort($data8, function($a, $b) use ($keys) {
    return array_search($a, $keys) <=> array_search($b, $keys);
});
print_r($data8); // ['京', '垓', '億', '無量大数', '那由多']


// asort：連想配列を要素で昇順にソート
$data9 = ['d'=>'banana', 'b'=>'apple', 'c'=>'grape', 'a'=>'mango'];
asort($data9);
print_r($data9); // ['b'=>'apple', 'd'=>'banana', 'c'=>'grape', 'a'=>'mango']


// arsort：連想配列を要素で降順にソート
$data10 = ['d'=>'banana', 'b'=>'apple', 'c'=>'grape', 'a'=>'mango'];
arsort($data10);
print_r($data10); // ['a'=>'mango', 'c'=>'grape', 'd'=>'banana', 'b'=>'apple']


// array_key_exists：連想配列に指定したキーが含まれているかどうかを判定
print array_key_exists('b', $data9); // true
print array_key_exists('f', $data9); // false

// array_walk：配列の各要素に関数を適用
$data11 = ['山田','田中','佐藤','鈴木','高橋'];
array_walk($data11, function(&$value) {
    $value = "New{$value}";
});
print_r($data11); // ['New山田', 'New田中', 'New佐藤', 'New鈴木', 'New高橋']


// array_walk_recursive：多次元配列の各要素に関数を適用
$data12 = [
    ['X-1','X-2','X-3'],
    ['Y-1','Y-2','Y-3'],
    ['Z-1','Z-2','Z-3'],
];
array_walk_recursive($data12, function(&$value) {
    $value = "New{$value}";
});
print_r($data12); // [['NewX-1','NewX-2','NewX-3'], ['NewY-1','NewY-2','NewY-3'], ['NewZ-1','NewZ-2','NewZ-3']]


// array_map：配列の各要素に関数を適用
$data13 = [2, 4, 6];
print_r(array_map(function($value) {
    return $value ** 2;
}, $data13)); // [4, 16, 36]


// array_filter：配列の各要素に関数を適用して、条件に合うものだけを抽出
$data14 = [1, 2, 3, 4, 5];
print_r(array_filter($data14, function($value) {
    return $value % 2 == 0;
})); // [2, 4]


// array_reduce：配列の各要素に関数を適用して、結果を累積する
$data15 = [1, 2, 3, 4, 5];
print_r(array_reduce($data15, function($carry, $value) {
    return $carry + $value;   // *１回目は$carry = 0, $value = 1 の加算になる
}, 0)); // 15
?>