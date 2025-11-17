<?php
// 値渡し
$a = 1;
$b = $a;
$b = 2;
print $a; // 1　*aは影響を受けない
print $b; // 2


// 参照渡し
$x = 1;
$y = &$x;
$y = 5;
print $x; // 5　*xは影響を受ける
print $y; // 5
?>


