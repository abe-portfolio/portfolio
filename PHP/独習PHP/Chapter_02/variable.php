<?php
// 可変変数
$x = 'title';
$title = 'PHP:Hypertext Preprocessor';
print $$x; //PHP:Hypertext Preprocessor
// $x = 'title'より、$$xは$titleとなる

print PHP_EOL; // 環境に依存せず改行させる

// 定数１ … $は必要ない。全て大文字で書く
const TAX = 1.1;
$prime1 = 1000;
$sum1 = $prime1 * TAX;
print $sum1; // 1100

print PHP_EOL;

// 定数２ … ifやfor内などのトップレベル以外での定数宣言
define('VALUE', 1.1);
$prime2 = 2000;
$sum2 = $prime2 * TAX;
print $sum2; // 2200

print PHP_EOL;

?>