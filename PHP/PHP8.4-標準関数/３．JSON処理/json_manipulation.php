<?php
/* 目次
1. json_encode
2. json_decode
3. json_validate
4. json_last_error
5. json_last_error_msg
*/

// json_encode
// データを JSON 形式に変換（連想配列　→　JSON）
$data = [
    'name' => '山田太郎',
    'age' => 20,
    'city' => '東京都'
];
echo json_encode($data);
// {"name":"山田太郎","age":20,"city":"東京都"}

// json_decode
// JSON 形式のデータをデコード（JSON　→　連想配列）
$json = '{"name":"山田太郎","age":20,"city":"東京都"}';
$data = json_decode($json, true);
print_r($data);
// Array ( [name] => 山田太郎 [age] => 20 [city] => 東京都 )   


// json_validate
// 構文だけを高速検証
$json = '{"name":"山田太郎","age":20,"city":"東京都"}';
if (json_validate($json)) {
    echo "構文が正しいです";
} else {
    echo "構文が正しくありません";
} 
// 構文が正しいです


//　+--------------------------------+
// 補足：json_validateとjson_decodeの組み合わせ
if (json_validate($json)) {
    $data = json_decode($json, true);
} 
// ※json_validateはエラー情報を返さないため
//   後述するjson_last_errorとjson_last_error_msgを使用してエラー情報を取得する方がより堅牢
//　+--------------------------------+


// json_last_error
// JSON操作によるエラーコードを取得

// json_last_error_msg
// JSON操作によるエラーメッセージを取得
$invalid_json = '{"name":"John","age":30,}'; // 末尾のカンマが無効
$result = json_decode($invalid_json);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "エラーコード: " . json_last_error() . "\n";
    echo "エラーメッセージ: " . json_last_error_msg() . "\n";
}
// 出力:
// エラーコード: 4
// エラーメッセージ: Syntax error

?>