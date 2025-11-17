<?php
// DateTimeクラス
//  日時を操作するためのクラス
$date = new DateTime();
print $date->format('Y-m-d H:i:s'); // 2025-11-06 10:00:00

$now = new DateTime('2025/11/06 10:00:00');
print $now->format('Y年m月d日 H時i分'); // 2025年11月06日 10時00分



// タイムゾーンの設定
$dt1 = new DateTime('now', new DateTimeZone('Asia/Tokyo'));
print $dt1->format('Y-m-d H:i:s'); // 2025-11-06 22:56:53

$dt2 = new DateTime('now', new DateTimeZone('America/New_York'));
print $dt2->format('Y-m-d H:i:s'); // 2025-11-06 08:56:53



// 年月日、時分秒を個別に設定する
$dt = new DateTime();
$dt->setDate(2025, 11, 6);
$dt->setTime(10, 70, 30);
print $dt->format('Y-m-d H:i:s'); // 2025-11-06 11:10:30



// setTimestamp タイムスタンプを設定する
$dt = new DateTime();
$dt->setTimestamp(1730716230); // 1730716230 はunixタイムスタンプ（1970年1月1日 00:00:00 UTC からの経過秒数）
print $dt->format('Y-m-d H:i:s'); // 2025-11-06 11:10:30



// createFromFormat 日時文字列を指定してDateTimeオブジェクトを作成する
//  $time の値のように日本語混在のような値を認識させるために使用する
$fmt = 'Y年m月d日 H時i分s秒';
$time = '2025年11月06日 10時00分30秒';
$dt = DateTime::createFromFormat($fmt, $time);
print $dt->format('Y-m-d H:i:s'); // 2025-11-06 10:00:30



// 日時の加算・減算
// DateIntervalクラスを使用する
//  引数は「P<日付間隔>T<時間間隔>」
//  日付間隔の間隔指示子
//   Y 年
//   M 月
//   W 週  *Dとは併用できない
//   D 日
//  時間間隔の間隔指示子
//   H 時
//   M 分
//   S 秒

//  加算（add）
$dt = new DateTime();
$dt->add(new DateInterval('P1D')); // P1D → 1日後
print $dt->format('Y-m-d H:i:s'); // 2025-11-07 10:00:00

//  減算（sub）
$dt = new DateTime();
$dt->sub(new DateInterval('P1D'));
print $dt->format('Y-m-d H:i:s'); // 2025-11-05 10:00:00



// diff 日時の差分を取得する
$dt1 = new DateTime('2025/11/06 10:00:00');
$dt2 = new DateTime('2026/11/07 10:00:00');
$diff = $dt1->diff($dt2);
print $diff->format('%Y年%m月%d日 %H時%i分%s秒'); // 1年0月1日 0時0分0秒    






