<?php
// ビット演算：整数を2進数（ビット列）で扱って演算すること
/*
    & : 論理積（AND）
    | : 論理和（OR）
    ^ : 排他的論理和（XOR）
    ~ : 否定（NOT）
    << : 左シフト
    >> : 右シフト
*/

$a = 5;    // 101
$b = 3;    // 011

$result = $a & $b;  // 001 (1)
echo $result;       // 1

$result = $a | $b;  // 111 (7)
echo $result;       // 7

$result = $a ^ $b;  // 110 (6)
echo $result;       // 6


$a = 5;   // 0000 0101 (例：8bit として)
$result = ~ $a;    // 1111 1010 (補数表現により -6)
echo $result;      // -6


// サンプルコード
// ネットワーク関連では ビット AND, OR, シフト が必須
$ip = ip2long("192.168.1.100");
$subnet = ip2long("192.168.1.0");
$mask = ip2long("255.255.255.0");

if (($ip & $mask) === $subnet) {
    echo "同じネットワークです";
}



// BitField : ビットフィールド：整数をビット列で表現すること
// 例えば、ユーザに権限情報を保存したいときにBitFieldを使用すると、ビット演算結果を格納する１カラムで済む。
const DELETE = 4;  // 100
const UPDATE = 2;  // 010
const READ   = 1;  // 001

// フラグを設定
$user = READ | UPDATE;   // 001 | 010 = 011 (3)

// 権限追加
$user |= DELETE;         // 011 | 100 = 111 (7)

// 権限があるか判定
if ($user & UPDATE) {
    echo "更新権限あり";
}

// 権限を外す
$user &= ~UPDATE;        // 111 & 101 = 101 (5)

// 権限の ON/OFF を切り替え（トグル）
$user ^= DELETE;        // 101 ^ 100 = 001 (1)
?>