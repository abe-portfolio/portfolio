<?php
// 文字列関数
$str = 'WINGSプロジェクト';
$data = 'Wings project';

// 文字列の長さを取得
print mb_strlen($str).PHP_EOL;      // 11
print strlen($str).PHP_EOL;         // 23
print mb_strwidth($str).PHP_EOL;    // 17

// 文字列の大文字・小文字を入れ替える
print mb_convert_case($data, MB_CASE_UPPER).PHP_EOL;    // WINGS PROJECT
print mb_convert_case($data, MB_CASE_LOWER).PHP_EOL;    // wings project
print mb_convert_case($data, MB_CASE_TITLE).PHP_EOL;    // Wings Project

// 部分文字列を取得する（１）
print mb_substr($str, 5, 2).PHP_EOL;    // プロ
print mb_substr($str, 5).PHP_EOL;       // プロジェクト
print mb_substr($str, 5, -4).PHP_EOL;   // プロ
print mb_substr($str, -6, 2).PHP_EOL;   // プロ

// 部分文字列を取得する（２）

?>