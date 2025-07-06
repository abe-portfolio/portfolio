<?php 
/* 目次
1. file_get_contents
2. file_put_contents
3.stream_context_create
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



// stream_context_create
// PHPでファイルやネットワークストリーム（HTTP, FTP など）にアクセスする際の「コンテキスト（文脈）」を作成
// コンテキスト = リクエストのメソッドやヘッダー、タイムアウトなど、ストリームの動作を細かく制御したい場合に使う
$context = stream_context_create([
    'http' => [
        'method' => 'POST',
        'header' => "Content-Type: application/json\r\n",
        'content' => $data
    ]
]);
// よく使うオプション
//method    	'GET', 'POST', 'PUT', 'DELETE' など
//header    	'Content-Type: application/json' など
//content   	POST送信するデータ
//timeout    	timeout 秒
//proxy     	プロキシサーバーの設定
//user_agent	ユーザーエージェントの設定
//follow_location	リダイレクトの設定
//max_redirects	リダイレクトの最大数
//ssl       	SSL証明書の検証
//verify_peer	SSL証明書の検証
?>