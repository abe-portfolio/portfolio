<?php
// 可変変数
$x = 'title';
$title = 'PHP:Hypertext Preprocessor';
print $$x; //PHP:Hypertext Preprocessor
// $x = 'title'より、$$xは$titleとなる

print PHP_EOL; // 環境に依存せず改行させる
print '---------------------------------------------------';
print PHP_EOL;

// 定数１ … $は必要ない。全て大文字で書く
const TAX = 1.1;
$prime1 = 1000;
$sum1 = $prime1 * TAX;
print $sum1; // 1100

print PHP_EOL;
print '---------------------------------------------------';
print PHP_EOL;

// 定数２ … ifやfor内などのトップレベル以外での定数宣言
define('VALUE', 1.5);
$prime2 = 2000;
$sum2 = $prime2 * VALUE;
print $sum2; // 3000

print PHP_EOL;
print '---------------------------------------------------';
print PHP_EOL;

// クォートとエスケープ処理
print 'You are "GREAT" teacher.'.PHP_EOL; // You are "GREAT" teacher.
print "You are 'GREAT' teacher.".PHP_EOL; // You are 'GREAT' teacher.
print 'He\'s "GREAT" teacher.';           // He's "GREAT" teacher.

print PHP_EOL;
print '---------------------------------------------------';
print PHP_EOL;

// ヒアドキュメント
$str = 'PHP(Hypertext Oreoricessor)';
$msg = <<< EOD
{$str} は、
サーバーサイドで動作するスクリプト言語です。
基礎固めからやっていきましょう。
EOD;
print $msg;

print PHP_EOL;
print '--------------------------------------------------';
print PHP_EOL;

// nullリテラル (printなどで表示しようとするとエラーが返される)
$nul_1;         // 変数のみあり、値が格納されていない。
$nul_2 = null;  // 明示的にnullを代入している。
$data = 12345;
unset($data);   // unset()関数で変数の内容が破棄された場合。

print PHP_EOL;
print '---------------------------------------------------';
print PHP_EOL;

// 配列
$data = ['藤波','成沢','阿良々木','皇','浅田'];
$data[] = '';   // 末尾に値を追加
// print $data;  エラー発生！
print_r($data); // 配列の中身を見やすく出力

?>