<?php
// 実行演算子
//  ->` ` または exec()関数を使用する
$result = `ls -la`;
print $result;

$result = exec('ls -la');
print $result;
?>