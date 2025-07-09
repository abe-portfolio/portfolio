<?php
/*  目次
1. time
2. date
3. strtotime
*/

// time
// 現在のタイムスタンプを取得（1970年1月1日0時0分0秒からの経過秒数）
echo time();

// date
// フォーマット出力
echo date('Y-m-d', time());

// strtotime
// 文字列→タイムスタンプ
echo strtotime('next Monday');  // 次の月曜日のタイムスタンプ
?>