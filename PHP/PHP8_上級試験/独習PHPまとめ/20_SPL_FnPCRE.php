<?php
// PCRE = 正規表現
// 正規表現を扱うときは、シングルクォートを使用する
//     ※ダブルクォートを使用すると、変数の展開が行われる


// preg_match：正規表現のマッチング（最初のマッチのみを返す）
$data = 'Hello World';
preg_match('/Hello/', $data, $matches);
print_r($matches); // ['Hello']


// preg_match_all：正規表現のマッチング（複数回マッチする場合）
$data = 'Hello RealWorld, Hello VirtualWorld';
preg_match_all('/Hello/', $data, $matches);
print_r($matches); // ['Hello', 'Hello']


// preg_replace：正規表現の置換
$data = 'Hello World';
preg_replace('/Hello/', 'Goodbye', $data);
print $data; // Goodbye World


// preg_replace_callback：正規表現の置換（コールバック関数を使用）
$data = 'お問い合わせはこちら。https://example.com/contact';
$result = preg_replace_callback('/http(s)?:\/\/[^\s]+/', function($matches) {
    return strtoupper($matches[0]); // URLの英字を大文字に変換
}, $data);
print $result; // お問い合わせはこちら。HTTPS://EXAMPLE.COM/CONTACT


// preg_split：正規表現の分割
$data = 'apple,banana,cherry';
$result = preg_split('/,/', $data);  // ',' や ","ではエラーになる
print_r($result); // ['apple', 'banana', 'cherry']


// preg_grep：正規表現のマッチング（配列の要素に対してマッチング）
$data = ['apple', 'banana', 'cherry'];
$result = preg_grep('/a/', $data);
print_r($result); // ['apple', 'banana']


// preg_filter：正規表現の置換（配列の要素に対して置換）
$data = ['apple', 'banana', 'cherry'];
$result = preg_filter('/apple/', 'orange', $data);
print_r($result); // ['orange']


// 正規表現の修飾子
/*
    i：大文字小文字を区別しない
    m：複数行モード
    s：ドットモード
    x：コメントの有効化
    u：正規表現パターンをUTF-8として扱う
*/


// 名前付きキャプチャグループ（?P<グループ名>）
$str = '彼の電話番号は0000-11-2222、私の電話番号は3333-44-5555です。郵便番号はどちらも666-7777です。';
if(preg_match_all('/(?P<area>[0-9]{2,4})-(?P<city>[0-9]{2,4})-(?P<local>[0-9]{4}/', $str, $data, PREG_SET_ORDER)) {
    foreach($data as $item) {
        print "電話番号：{$item[0]}<br>";
        print "市外局番：{$item['area']}<br>";
        print "市内局番：{$item['city']}<br>";
        print "加入者番号：{$item['local']}<br>";
    }
}
/*
電話番号：0000-11-2222
市外局番：0000
市内局番：11
加入者番号：2222
電話番号：3333-44-5555
市外局番：3333
市内局番：44
加入者番号：5555
*/


