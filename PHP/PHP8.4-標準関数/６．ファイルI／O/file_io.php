<?php 
/* 目次
1. file_get_contents
2. file_put_contents
*/


//file_get_contents
// ファイルの内容を文字列として読み込む
echo file_get_contents('example.txt');

// 引数
//  1   取得元のファイルまたはURL
//  2   include_pathの使用（true / false(デフォルト)）
//  3   ストリームコンテキスト（HTTP, FTPなど）
$context = stream_context_create([
    'http' => [
        'method' => 'GET',
        'header' => 'User-Agent: MyBot/1.0'
    ]
]);
//  4   読み取り開始位置（指定バイト数分スキップして読み込み)
//  5   指定された長さだけ読み込む(nullまたは省略で全体)


// 存在判定込のfile_get_contents
$content = file_get_contents('nonexistent.txt');
if ($content === false) {
    echo "ファイルを読み込めませんでした";
}
// ファイルを読み込めませんでした ※ファイルが存在しない場合はfalseが返る




//file_put_contents
// ファイルに文字列を書き込む
file_put_contents('example.txt', 'Hello, World!');

// 引数
//  1   書き込み先のファイル
//  2   書き込みデータ（文字列 or 配列）
//  3   書き込み方法の制御（追記・ロックなど）
//        -> FILE_USE_INCLUDE_PATH  ： include_path を使ってファイルを探す
//        -> FILE_APPEND            ： 追記する（デフォルトは上書き） 
//        -> LOCK_EX                ： ファイル書き込み時に排他ロックする
//  4   ストリームコンテキスト（HTTP, FTPなど）
$context = stream_context_create([
    'http' => [
        'method' => 'POST',
        'header' => 'Content-Type: application/json'
    ]
]);

?>