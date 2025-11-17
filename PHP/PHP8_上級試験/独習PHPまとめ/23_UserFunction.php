<?php
function getTriangleArea(float $base, float $height): float {
    return $base * $height / 2;
}

$area = getTriangleArea(10, 5);
print "三角形の面積は{$area}です。<br>";  // 三角形の面積は25です。



// null許容型
function hoge(?int $value): void {
    print $value;
}
hoge(10);  // 10
hoge(null);  // null
// hoge();  // TypeError



// Union型
function fuga(int|float $value): void {
    print $value;
}
fuga(10);  // 10
fuga(10.5);  // 10.5
// fuga("10");  // TypeError



// 関数内でグローバル変数を使用する
$global_value = 10;
function hoge2(): void {
    global $global_value;
    print $global_value;  // 10
    $global_value = 20;
}
hoge2();
print $global_value;  // 20



// static変数
function hoge3(): void {
    static $count = 0;
    $count++;
    print $count;
}
hoge3();  // 1
hoge3();  // 2
hoge3();  // 3


// デフォルト引数
function hoge4(int $value = 10): void {
    print $value;
}
hoge4();  // 10
hoge4(20);  // 20


// 値渡し
function increment(int $value): int {
    $value++;
    return $value;
}
$value = 10;
print increment($value)."<br>";  // 11
print $value;  // 10


// 参照渡し
function increment2(int &$value): int {
    $value++;
    return $value;
}
$value = 10;
print increment2($value)."<br>";  // 11
print $value;  // 11



// 名前付き引数  *仮引数名を使用するので、関数側の引数名などを修正すると、呼び出し側も合わせて修正しなければならない
function hoge5(int $value1, int $value2): void {
    print $value1;
    print $value2;
}
hoge5(value2: 20, value1: 10);  // 1020
hoge5(value1: 10, value2: 20);  // 1020
hoge5(10, 20);                  // 1020
// hoge5(value1: 10, 20);       // TypeError


// 可変長引数
function hoge6(int ...$values): int {
    $result = 0;
    foreach ($values as $value) {
        $result += $value;
    }
    return $result;
}
print hoge6(1, 2, 3, 4, 5, 6, 7, 8, 9, 10)."<br>";  // 55


// 再起関数
function factorial(int $num): int {
    if ($num !== 0) {
        return $num * factorial($num - 1); // ($num - 1)を引数に107行目にジャンプするイメージ
    }
    return 1;
}
print factorial(5)."<br>";  // 120



// 高級関数
function myArrayWaik(array $array, callable $func): void {
    foreach ($array as $key => $value) {
        $func($value, $key); // $funcは引数に渡された関数
    }
}
function showItem(mixed $value, int|string $key): void {
    print $key.":".$value."<br>";
}
$data = ['杉山', '阿良々木', '皇', '浅田'];
myArrayWaik($data, 'showItem');
// 0:杉山
// 1:阿良々木
// 2:皇
// 3:浅田



// クロージャ(無名関数)
// 高級関数のスクリプトを無名関数で書き換えた例
function myArrayWaik2(array $array, callable $func): void {
    foreach ($array as $key => $value) {
        $func($value, $key); // $funcは引数に渡された関数
    }
}
$data = ['杉山', '阿良々木', '皇', '浅田'];
myArrayWaik2($data, function($value, $key) {
    print $key.":".$value."<br>";
});
// 0:杉山
// 1:阿良々木
// 2:皇
// 3:浅田


//use命令
$increment = function(int $value) use (&$result): int {
    $value++;
    return $value;
};
print $increment(10)."<br>";  // 11

// アロー関数
// PHP7.4以降では、無名関数を更にシンプルに書くことができるようになった。
$increment2 = fn(int $value): int => $value++;
print $increment2(10)."<br>";  // 11




// ジェネレータ
// yieldキーワードを使用することで、関数をジェネレータとして宣言できる。
//     yieldは、関数の実行を中断し、その時点の値を返す。
//     次回関数が呼び出された時に、中断した位置から再開する。
/*  例（現実的ではないが、以下の関数をforeachで回してprintしたとする）
    function A() {
        return 'あいうえお';
        return 'かきくけこ';
        return 'さしすせそ';
    }
    foreach (A() as $value) {
        print $value."<br>";  // あいうえお
    }
    // あいうえお
    // あいうえお
    // あいうえお

    function B() {
        yield 'あいうえお';
        yield 'かきくけこ';
        yield 'さしすせそ';
    }
    foreach (B() as $value) {
        print $value."<br>";
    }
        // あいうえお
        // かきくけこ
        // さしすせそ
*/
function readLines(string $path) {
    $i = 0; // 行数
    $file = fopen($path, 'rb') or die('ファイルを開けませんでした');
    while ($line = fgets($file)) {
        $i++;
        yield $line;
    }
    fclose($file);
    return $i;
}


// sample.txtから行単位にテキストを出力
$generator = readLines('sample.txt');
foreach ($generator as $line) {
    print $line."<br>";
}
// 最後に読み込んだ行数を取得（->getReturn()を使用）
print "{$generator->getReturn()}行読み込みました。<br>";


// yield from
function inner() {
    yield 'A';
    yield 'B';
}
function outer() {
    yield 'Start';
    yield from inner(); // inner() のジェネレーターを委譲
    yield 'End';
}
foreach (outer() as $val) {
    echo $val . PHP_EOL;
}
// Start
// A
// B
// End





