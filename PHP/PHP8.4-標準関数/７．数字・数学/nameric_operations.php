<?php
/*  目次
1. round
2. ceil
3. floor
4. abs
5. pow
6. sqrt
7. cbrt
8. max
9. min
10. array_sum
11. array_product
12. array_diff
13. array_intersect
14. array_merge
15. array_slice
16. array_chunk
17. array_reverse
18. rand
19. random_int
20. random_bytes
21. mt_rand
22. log
23. log10
24. log1p
25. exp
26. bcadd
27. bcsub
28. bcmul
29. bcdiv
30. bcmod
31. bcpow
32. bcsqrt
33. bcscale
34. intval
35. floatval
36. is_numeric
37. is_int
38. is_float
39. is_finite
40. is_infinite
41. is_nan
42. decbin
43. decoct
44. dechex
45. bindec
46. octdec
47. hexdec
48. base_convert
*/


// round
// 四捨五入する。第二引数は小数点以下の桁数を指定する（デフォルトは0）
$num = 1.23456789;
$out = round($num, 2);
var_dump($out);
// float(1.23)


// ceil
// 小数点以下を切り上げて、指定された数値以上の最小の整数を返す
$num = 1.23456789;
$out = ceil($num);
var_dump($out);
// float(2)


// floor
// 小数点以下を切り捨てて、指定された数値以下の最大の整数を返す
$num = 1.23456789;
$out = floor($num);
var_dump($out);
// float(1)


// abs
// 絶対値を返す
$num = -1.23456789;
$out = abs($num);
var_dump($out);
// float(1.23)


// pow
// べき乗を返す
$num = 2;
$out = pow($num, 3);
var_dump($out);
// int(8)   2**3


// sqrt
// 平方根を返す
$num = 4;
$out = sqrt($num);
var_dump($out);
// float(2)



// cbrt
// 立方根を返す
$num = 8;
$out = cbrt($num);
var_dump($out);
// float(2)


// max
// 最大値を返す
$num = [1, 2, 3, 4, 5];
$out = max($num);
var_dump($out);
// int(5)


// min
// 最小値を返す
$num = [1, 2, 3, 4, 5];
$out = min($num);
var_dump($out);
// int(1)


// array_sum
// 配列の要素の合計値を返す
$num = [1, 2, 3, 4, 5];
$out = array_sum($num);
var_dump($out);
// int(15)


// array_product
// 配列の要素の積を返す
$num = [1, 2, 3, 4, 5];
$out = array_product($num);
var_dump($out);
// int(120)


// array_diff
// 配列の差を返す
$num = [1, 2, 3, 4, 5];
$out = array_diff($num, [2, 4]);
var_dump($out);
// array(3) { [0]=> int(1) [2]=> int(3) [4]=> int(5) }


// array_intersect
// 配列の共通要素を返す
$num = [1, 2, 3, 4, 5];
$out = array_intersect($num, [2, 4]);
var_dump($out);
// array(2) { [1]=> int(2) [3]=> int(4) }


// array_merge
// 配列を結合する
$num = [1, 2, 3, 4, 5];
$out = array_merge($num, [6, 7, 8, 9, 10]);
var_dump($out);
// array(10) { [0]=> int(1) [1]=> int(2) [2]=> int(3) [3]=> int(4) [4]=> int(5) [5]=> int(6) [6]=> int(7) [7]=> int(8) [8]=> int(9) [9]=> int(10) }


// array_slice
// 配列の一部を返す
$num = [1, 2, 3, 4, 5];
$out = array_slice($num, 1, 3);
var_dump($out);
// array(3) { [0]=> int(2) [1]=> int(3) [2]=> int(4) }


// array_chunk
// 配列を指定された数で分割する
$num = [1, 2, 3, 4, 5];
$out = array_chunk($num, 2);
var_dump($out);
// array(3) { [0]=> array(2) { [0]=> int(1) [1]=> int(2) } [1]=> array(2) { [0]=> int(3) [1]=> int(4) } [2]=> array(1) { [0]=> int(5) } }


// array_reverse
// 配列を反転する
$num = [1, 2, 3, 4, 5];
$out = array_reverse($num);
var_dump($out);
// array(5) { [0]=> int(5) [1]=> int(4) [2]=> int(3) [3]=> int(2) [4]=> int(1) }


// rand
// 乱数を返す
$num = rand(1, 10);
var_dump($num);
// int(5)


// random_int
// 乱数を返す
$num = random_int(1, 10);
var_dump($num);
// int(5)


// random_bytes
// 乱数を返す
$num = random_bytes(10);
var_dump($num);
// string(10) "5678901234"



// mt_rand
// 乱数を返す
$num = mt_rand(1, 10);
var_dump($num);
// int(5)



// log
// 対数を返す
$num = 10;
$out = log($num);
var_dump($out);
// float(1)



// log10
// 10の対数を返す
$num = 10;
$out = log10($num);
var_dump($out);
// float(1)


// log1p
// 1+対数を返す
$num = 1;
$out = log1p($num);
var_dump($out);
// float(0)


// exp
// 指数を返す
$num = 1;
$out = exp($num);
var_dump($out);
// float(2.718281828459)



// BC Mathを利用するためには拡張機能を有効にする必要がある
// bcadd
// 任意の精度で加算を行う
$num1 = "1.23456789";
$num2 = "2.34567890";
$out = bcadd($num1, $num2, 10);
var_dump($out);
// string(10) "3.5802467900"


// bcsub
// 任意の精度で減算を行う
$num1 = "1.23456789";
$num2 = "2.34567890";
$out = bcsub($num1, $num2, 10);
var_dump($out);
// string(10) "-1.1111110100"


// bcmul
// 任意の精度で乗算を行う
$num1 = "1.23456789";
$num2 = "2.34567890";
$out = bcmul($num1, $num2, 10);
var_dump($out);
// string(10) "2.8934010518"



// bcdiv
// 任意の精度で除算を行う
$num1 = "1.23456789";
$num2 = "2.34567890";
$out = bcdiv($num1, $num2, 10);
var_dump($out);
// string(10) "0.5263157895"


// bcmod
// 任意の精度で剰余を返す
$num1 = "1.23456789";
$num2 = "2.34567890";
$out = bcmod($num1, $num2, 10);
var_dump($out);
// string(10) "1.2345678900"


// bcpow
// 任意の精度でべき乗を行う
$num1 = "1.23456789";
$num2 = "2.34567890";
$out = bcpow($num1, $num2, 10);
var_dump($out);
// string(10) "1.5241383936"


// bcsqrt
// 任意の精度で平方根を返す
$num = "1.23456789";
$out = bcsqrt($num, 10);
var_dump($out);
// string(10) "1.1111111111"


// bcscale
// 任意の精度でスケールを設定する
$num = "1.23456789";
$out = bcscale(10);
var_dump($out);
// int(10)


// intval
// 文字列を整数に変換する
$num = "1.23456789";
$out = intval($num);
var_dump($out);
// int(1)


// floatval
// 文字列を浮動小数点数に変換する
$num = "1.23456789";
$out = floatval($num);
var_dump($out);
// float(1.23)


// is_numeric
// 数値かどうかを確認する
$num = "1.23456789";
$out = is_numeric($num);
var_dump($out);
// bool(true)


// is_int
// 整数かどうかを確認する
$num = 1;
$out = is_int($num);
var_dump($out);
// bool(true)


// is_float
// 浮動小数点数かどうかを確認する
$num = 1.23;
$out = is_float($num);
var_dump($out);
// bool(true)


// is_finite
// 有限かどうかを確認する
$num = 1.23;
$out = is_finite($num);
var_dump($out);
// bool(true)


// is_infinite
// 無限大かどうかを確認する
$num = 1.23;
$out = is_infinite($num);
var_dump($out);
// bool(false)


// is_nan
// 非数かどうかを確認する
$num = 1.23;
$out = is_nan($num);
var_dump($out);
// bool(false)


// decbin
// 10進数を2進数に変換する
$num = 10;
$out = decbin($num);
var_dump($out);
// string(4) "1010"


// decoct
// 10進数を8進数に変換する
$num = 10;
$out = decoct($num);
var_dump($out);
// string(2) "12"


// dechex
// 10進数を16進数に変換する
$num = 10;
$out = dechex($num);
var_dump($out);
// string(1) "a"



// bindec
// 2進数を10進数に変換する
$num = "1010";
$out = bindec($num);
var_dump($out);
// int(10)


// octdec
// 8進数を10進数に変換する
$num = "12";
$out = octdec($num);
var_dump($out);
// int(10)


// hexdec
// 16進数を10進数に変換する
$num = "a";
$out = hexdec($num);
var_dump($out);
// int(10)



// base_convert
// 任意の基数の数値を別の基数に変換する
$num = "1010";
$out = base_convert($num, 2, 10);
var_dump($out);
// string(4) "1010"

?>