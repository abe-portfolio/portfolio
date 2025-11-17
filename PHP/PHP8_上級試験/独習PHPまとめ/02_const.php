<?php
// 定数
const TAX = 1.1;
$prime = 1000;
$sum = $prime * TAX;
print $sum;
// ----------------
define('TAX2', 1.1);
$price = 1000;
$sum = $price * TAX2;
print $sum;

/*
define関数による定数の定義も可能
define('TAX', 1.1);
$price = 1000;
$sum = $price * TAX;
print $sum;

constとdefine()の違い
　・define()は動的に定数が定義される
　　→定義されるタイミングが異なる
　　　const　   ：コンパイル時
　　　define()　：実行時（if文などで動的に定義させたい場合などに有用）

　・使用用途
　　　const　   ：クラス定数
　　　define()　：グローバル定数(クラス内でdefine()を使用するとエラーになる)

　・設定可能な値
    const　   ：整数、浮動小数点数、文字列、配列、オブジェクト
    define()　：変数の値や、演算結果も定義できる

    例）
    　NG：const MAIN = dirname(__FILE__).'/main.php';
    　OK：define('MAIN', dirname(__FILE__).'/main.php');
*/
