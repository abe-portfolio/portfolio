<?php
/*  目次
1. strlen
2. mb_strlen
3. trim
4. mb_trim
5. substr
6. mb_substr
7. str_contains
8. str_starts_with
9. str_ends_with
10. str_replace
11. explode
12. implode
13. preg_match
14. preg_replace
15. grapheme_str_split
*/

// strlen
//文字列の長さを取得
$data = "Hello World";
echo strlen($data);
// 11   ※半角スペースも1バイトとしてカウント


// mb_strlen
// 文字列の長さを取得（多言語対応）
$data3 = "あいうえお　かきくけこ　さしすせそ";
echo mb_strlen($data3);
// 17   ※全角スペースは2バイトとしてカウント


// trim
// 文字列の前後の空白を削除
$data2 = " Hello   World ";
echo trim($data2);
// Hello   World


// mb_trim
// 文字列の前後の空白を削除（多言語対応）
$data4 = "　　あいうえお　　かきくけこ　　さしすせそ　　";
echo mb_trim($data4);
//  あいうえお　　かきくけこ　　さしすせそ


// substr
// 文字列の一部を取得
$data = "Hello World";
echo substr($data, 0, 5);
// Hello


// mb_substr
// 文字列の一部を取得（多言語対応）
$data3 = "あいうえお　かきくけこ　さしすせそ";
echo mb_substr($data3, 0, 5);
// あいうえお


// str_contains
// 文字列に指定した文字列が含まれているかを判定
$data = "Hello World";
if (str_contains($data, "Hello")) {
    echo "含まれています";
} else {
    echo "含まれていません";
}
// 含まれています


// str_starts_with
// 文字列の先頭が指定した文字列から始まるかを判定
$data = "Hello World";
if (str_starts_with($data, "Hello")) {
    echo "先頭が一致しています";
} else {
    echo "先頭が一致していません";
}
// 先頭が一致しています


// str_ends_with
// 文字列の末尾が指定した文字列から終わるかを判定
$data = "Hello World";
if (str_ends_with($data, "World")) {
    echo "末尾が一致しています";
} else {
    echo "末尾が一致していません";
}
// 末尾が一致しています


// str_replace
// 文字列の置換
$data = "Hello World";
echo str_replace("Hello", "Goodbey", $data);
// Goodbey World


// explode
// 文字列の分割（※配列で返す）
$data = "Hello World";
print_r(explode(" ", $data));
// Array ( [0] => Hello [1] => World )
// これぞれの変数に受け取るには
list($first, $second) = explode(" ", $data);
// もしくは（PHP7.1以降）
[$first, $second] = explode(" ", $data);
// 受け取る変数が多い場合はnull、少ない場合は余った要素は無視される


// implode
// 配列を文字列に変換（結合）
$array = ["Hello", "World"];
echo implode(" ", $array);
// Hello World


// preg_match
// 正規表現のパターンを指定
$data = "Hello World";
$pattern = "/^[a-zA-Z0-9]+$/"; // 先頭から末尾まで、すべて半角英字または半角数字のみ
if (preg_match($pattern, $data)) {
    echo "マッチしました";
} else {
    echo "マッチしませんでした";
}
// マッチしました


// preg_replace
// 正規表現を用いて置換
$data = "Hello World";
echo preg_replace($pattern, "置換後", $data);
// 置換後 置換後　　※半角英字または半角数字のみがマッチするため"Hello World"はどちらも置換される


// grapheme_str_split
// Unicodeの書記素単位（ユーザーが「1文字」と認識する単位）で文字列を分割
$data3 = "あいうえお　かきくけこ　さしすせそ";
$len = 5;   // 何文字ごとに分割するか
print_r(grapheme_str_split($data3, $len));
// Array ( [0] => あいうえお [1] => 　かきく　 [2] => けこ　さし [3] => すせそ )

?>