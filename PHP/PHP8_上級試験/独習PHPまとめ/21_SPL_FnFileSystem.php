<?php
// テキストファイルへの書き込み（上書き）
$file = 'example.txt';
$content = 'Hello, World!';
file_put_contents($file, $content);

// 末尾への追記
file_put_contents($file, $content, FILE_APPEND);

// 排他ロック（書き込みが完了すると、ロックも解除される）
file_put_contents($file, $content, LOCK_EX);

// *file_put_contents()はfopen／fwrite／fclose を組み合わせたような処理を自動で行っている


// ファイルを開く
/* 
    オープンモード
        r：読み込み専用
        w：書き込み専用（上書き）
        a：書き込み専用（末尾に追記）
        x：書き込み専用（新規作成）

*/
$file = 'example.txt';
$handle = fopen($file, 'w');   // 書き込み専用（上書き）
$handle = fopen($file, 'a');   // 書き込み専用（末尾に追記）
$handle = fopen($file, 'x');   // 書き込み専用（新規作成）
$handle = fopen($file, 'r');   // 読み込み専用
$handle = fopen($file, 'r+');  // 読み込み専用と書き込み専用
$handle = fopen($file, 'w+');  // 書き込み専用と読み込み専用
$handle = fopen($file, 'a+');  // 末尾に追記と読み込み専用
$handle = fopen($file, 'x+');  // 新規作成と読み込み専用


// ファイルを閉じる
fclose($handle);


// ファイルへの書き込み
fwrite($handle, $content);


// ファイルのロック（排他ロック）  *他者は書き込み／読み取り不可
flock($handle, LOCK_EX);
// ファイルのロック（共有ロック）  *他者が読み取り可能、書き込み不可
flock($handle, LOCK_SH);
// ファイルのロック解除
flock($handle, LOCK_UN);


// タブ区切りのファイルの読み込み
$file = 'example.txt';
$handle = fopen($file, 'r');
$data = fgetcsv($handle, 1024, "\t"); // 1024バイトまで読み込む

// CSVファイルの読み込み
$file = 'example.csv';
$handle = fopen($file, 'r');
$data = fgetcsv($handle);
