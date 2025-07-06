<?php
/*  目次
1. time
2. date
3. strtotime
*/

// time
// 現在のタイムスタンプを取得
echo time();

// date
// フォーマット出力
echo date('Y-m-d', $now);

// strtotime
// 文字列→タイムスタンプ
echo strtotime('next Monday');  // 次の月曜日のタイムスタンプ
?>