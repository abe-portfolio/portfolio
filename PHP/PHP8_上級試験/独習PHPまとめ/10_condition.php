<?php
// 条件演算子（?:）      *三項演算子ともいう
//   ->条件 ? 真の場合の値 : 偽の場合の値
$score = 80;
print $score >= 80 ? '合格' : '不合格'; // 合格

// 省略構文
// 変数がnullや空文字、ゼロなどのif文でfalseが変える値である場合に、指定した値を出力したい場合など
$message = '';
print $message ?: '空です'; // 空です



// null合体演算子（??）   nullの場合のみを判定（ゼロや空文字はtrueになる）
//   ->変数 ?? デフォルト値
$message = null;
print $message ?? 'NULLです'; // NULLです
?>