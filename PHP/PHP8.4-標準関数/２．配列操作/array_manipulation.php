<?php
/*  目次
1. array_map
2. array_filter
3. array_values
4. array_find
5. array_find_key
6. array_any
7. array_all
8. array_reduce
9. array_merge
10. in_array
11. array_key_exists
12. sort
13. rsort
14. usort
15. asort
16. arsort
17. ksort
18. krsort
19. natsort
20. natcasesort
21. shuffle
22. array_reverse
*/


// array_map
// 配列の各要素に関数を適用
$data = [' apple ', 'b a n a n a', ' cherr y '];
$out = array_map('trim', $data);
var_dump($out);
// 結果（$outには、trim関数(前後の余白削除)が適用された結果が入っている）
// array(3) {
    // [0]=>
    // string(5) "apple"
    // [1]=>
    // string(11) "b a n a n a"
    // [2]=>
    // string(7) "cherr y"
// }
// ※ $out = ['apple', 'b a n a n a', 'cherr y']



// array_filter
// 配列の各要素に関数を適用して、条件に合うものだけを抽出
$data = [1, 2, 3, 4, 5];
$out = array_filter($data, fn($v)=>$v%2==0);
var_dump($out);
// 結果
// array(2) {
    // [1]=>
    // int(2)
    // [3]=>
    // int(4)
// }
// ※ $out = [2, 4]



// array_values
// 配列のキーを０から連続するように再セットする
$data = [1, 2, 3, 4, 5];
$out = array_filter($data, fn($v)=>$v%2==0);
$out = array_values($out);
var_dump($out);
// 結果（array_filterの結果と比較すると分かりやすい）
// array(2) {
    // [0]=>
    // int(2)
    // [1]=>
    // int(4)
// }
// ※ $out = [2, 4]



// array_find
// 配列の各要素に関数を適用して、条件に合う最初の"要素"のみを抽出
$data = [1, 2, 3, 4, 5];
$out = array_find($data, fn($v)=>$v%2==0);
var_dump($out);
// 結果
// int(2)
// マッチする要素がない場合は、nullを返す



// array_find_key
// 配列の各要素に関数を適用して、条件に合う最初の"キー（インデックス）"を抽出
$data = [1, 2, 3, 4, 5];
$out = array_find_key($data, fn($v)=>$v%2==0);
var_dump($out);
// 結果
// int(1)



// array_any
// 配列の各要素に関数を適用して、条件に合うものがあるかどうかを確認
$data = [1, 2, 3, 4, 5];
$out = array_any($data, fn($v)=>$v%2==0);
var_dump($out);
// 結果
// bool(true)
// マッチする要素がない場合は、falseを返す



// array_all
// 配列の各要素に関数を適用して、条件にすべて合っているかどうかを確認
$data = [1, 2, 3, 4, 5];
$out = array_all($data, fn($v)=>$v%2==0);
var_dump($out);
// 結果
// bool(false)



// array_reduce
// 配列の各要素に関数を適用して、結果を累積する（１つの変数にまとめる）
$data = [1, 2, 3, 4, 5];
$out = array_reduce($data, fn($c,$v)=>$c+$v, 0);
var_dump($out);
// 結果
// int(15)
// $c：累積値　　　$v：現在の値　　　$init：初期値
// １回目：$c=0,  $v=1 → $c=1
// ２回目：$c=1,  $v=2 → $c=3
// ３回目：$c=3,  $v=3 → $c=6
// ４回目：$c=6,  $v=4 → $c=10
// ５回目：$c=10, $v=5 → $c=15



// array_merge
// 配列を結合する
$data1 = [1, 2, 3];
$data2 = [4, 5, 6];
$out = array_merge($data1, $data2);
var_dump($out);
// 結果 
// array(6) {
    // [0]=>
    // int(1)
    // [1]=>
    // int(2)
    // [2]=>
    // int(3)
    // [3]=>
    // int(4)
    // [4]=>
    // int(5)
    // [5]=>
    // int(6)
// }
// ※ $out = [1, 2, 3, 4, 5, 6]



// in_array
// 配列の中に指定した"値"があるかどうかを確認
$data = [1, 2, 3, 4, 5];
$out = in_array(3, $data);
var_dump($out);
// 結果
// bool(true)
// マッチする要素がない場合は、falseを返す



// array_key_exists
// 配列の中に指定した"キー（インデックス）"があるかどうかを確認
$data = [1, 2, 3, 4, 5];
$out = array_key_exists(3, $data);
var_dump($out);
// 結果
// bool(true)
// マッチするキーがない場合は、falseを返す  



// 以下、sort系の関数は破壊的な関数であり、
// sort($data); とすると $data の値がソートされ上書きされる。 
// $out = sort($data); としても、$out には　bool が返され、$data自体はソートされ上書きされる


// sort
// 配列を昇順にソートする
$data = [5, 2, 3, 4, 1];
sort($data);
var_dump($out);
// 結果
// array(5) {
    // [0]=>
    // int(1)
    // [1]=>
    // int(2)
    // [2]=>
    // int(3)
    // [3]=>
    // int(4)
    // [4]=>
    // int(5)
// }
// ※ $data = [1, 2, 3, 4, 5]



// rsort
// 配列を降順にソートする
$data = [5, 2, 3, 4, 1];
rsort($data);
var_dump($out);
// 結果
// array(5) {
    // [0]=>
    // int(5)
    // [1]=>
    // int(4)
    // [2]=>
    // int(3)
    // [3]=>
    // int(2)
    // [4]=>
    // int(1)
// }
// ※ $data = [5, 4, 3, 2, 1]



// usort
// 配列をユーザー定義の比較関数で自由ソートする
$data = [5, 2, 3, 4, 1];
usort($data, fn($a,$b)=>$a<=>$b);
var_dump($out);
// 結果
// array(5) {
    // [0]=>
    // int(1)
    // [1]=>
    // int(2)
    // [2]=>
    // int(3)
    // [3]=>
    // int(4)
    // [4]=>
    // int(5)
// }
// ※ $data = [1, 2, 3, 4, 5] 



// asort
// 配列を要素で昇順にソートする（キーは保持）
$data = [
    "d" => "banana",
    "b" => "apple",
    "c" => "grape",
    "a" => "mango"
];
asort($data);
var_dump($out);
// 結果
// array(4) {
    // ["b"]=>
    // string(5) "apple"
    // ["d"]=>
    // string(6) "banana"
    // ["c"]=>
    // string(5) "grape"
    // ["a"]=>
    // string(5) "mango"
// }
// ※ $data = ["b"=>"apple", "d"=>"banana", "c"=>"grape", "a"=>"mango"]



// arsort
// 配列を要素で降順にソートする（キーは保持）
$data = [
    "d" => "banana",
    "b" => "apple",
    "c" => "grape",
    "a" => "mango"
];
arsort($data);
var_dump($out);
// 結果
// array(4) {
    // ["a"]=>
    // string(5) "mango"
    // ["c"]=>
    // string(5) "grape"
    // ["d"]=>
    // string(6) "banana"
    // ["b"]=>
    // string(5) "apple"
// }
// ※ $data = ["a"=>"mango", "c"=>"grape", "d"=>"banana", "b"=>"apple"]



// ksort
// 配列をキーで昇順にソートする
$data = [
    "d" => "banana",
    "b" => "apple",
    "c" => "grape",
    "a" => "mango"
];
ksort($data);
var_dump($out);
// 結果
// array(4) {
    // ["a"]=>
    // string(5) "mango"
    // ["b"]=>
    // string(5) "apple"
    // ["c"]=>
    // string(5) "grape"
    // ["d"]=>
    // string(6) "banana"
// }
// ※ $data = ["a"=>"mango", "b"=>"apple", "c"=>"grape", "d"=>"banana"]



// krsort
// 配列をキーで降順にソートする
$data = [
    "d" => "banana",
    "b" => "apple",
    "c" => "grape",
    "a" => "mango"
];
krsort($data);
var_dump($out);
// 結果
// array(4) {
    // ["d"]=>
    // string(6) "banana"
    // ["c"]=>
    // string(5) "grape"
    // ["b"]=>
    // string(5) "apple"
    // ["a"]=>
    // string(5) "mango"
// }
// ※ $data = ["d"=>"banana", "c"=>"grape", "b"=>"apple", "a"=>"mango"]



// natsort
// 配列を自然順でソートする(数字を含む文字列のソートに強い)
// ※大文字小文字を区別する（大文字　> 小文字）
$data = ["file10.txt", "file1.txt", "file9.txt"];
natsort($data);
var_dump($out);
// 結果
// array(3) {
    // [0]=>
    // string(8) "file1.txt"
    // [1]=>
    // string(8) "file9.txt"
    // [2]=>
    // string(8) "file10.txt"
// }
// ※ $data = ["file1.txt", "file9.txt", "file10.txt"]

// natsortd() では降順ができないため、結果を array_reverse() する。



// natcasesort
// 配列を自然順でソートする(大文字小文字を区別しない)
// ※大文字小文字を区別しない（大文字　= 小文字）
$data = ["apple", "banana", "Apple", "cherry", "Banana"];
natcasesort($data);
var_dump($data);
// 結果
// array(5) {
    // [2]=>
    // string(5) "Apple"
    // [0]=>
    // string(5) "apple"
    // [1]=>
    // string(5) "banana"
    // [4]=>
    // string(5) "Banana"
    // [3]=>
    // string(6) "cherry"
// }
// ※ $data = ["Apple", "apple", "banana", "Banana", "cherry"]
// ※ Apple apple は等価のため出力順は安定しない



// shuffle
// 配列をシャッフルする
$data = [1, 2, 3, 4, 5];
shuffle($data);
var_dump($data);
// 結果
// array(5) {
    // [0]=>
    // int(2)
    // [1]=>
    // int(5)
    // [2]=>
    // int(4)
    // [3]=>
    // int(3)
    // [4]=>
    // int(1)
//  }
// ※ $data = [2, 5, 4, 3, 1]



// array_reverse
// 配列を逆順にする
$data = [1, 2, 3, 4, 5];
$out = array_reverse($data);
var_dump($out);
// 結果
// array(5) {
    // [0]=>
    // int(5)
    // [1]=>
    // int(4)   
    // [2]=>
    // int(3)
    // [3]=>
    // int(2)
    // [4]=>
    // int(1)
// }
// ※ $out = [5, 4, 3, 2, 1]
?>