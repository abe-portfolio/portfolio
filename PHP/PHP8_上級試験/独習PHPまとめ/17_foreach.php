<?php

// ========================================
// foreach文の基本
// ========================================

/*
foreach ($array as $value) {
    // $valueを使った処理
}

foreach ($array as $key => $value) {
    // $keyと$valueを使った処理
}
*/


// ========================================
// 1. 基本的なforeach（値のみ）
// ========================================

$fruits = ['りんご', 'バナナ', 'オレンジ'];

foreach ($fruits as $fruit) {
    echo $fruit . "\n";
}
// りんご
// バナナ
// オレンジ


// ========================================
// 2. キーと値を両方取得
// ========================================

$prices = [
    'りんご' => 100,
    'バナナ' => 150,
    'オレンジ' => 120
];

//       $priceから  Key(キー) Value(値)を取得
foreach ($prices as $fruit => $price) {
    echo "{$fruit}の価格: {$price}円\n";
}
// りんごの価格: 100円
// バナナの価格: 150円
// オレンジの価格: 120円


// ========================================
// 3. インデックス付きで取得（配列の場合）
// ========================================

$colors = ['赤', '青', '緑'];

foreach ($colors as $index => $color) {
    echo "インデックス{$index}: {$color}\n";
}
// インデックス0: 赤
// インデックス1: 青
// インデックス2: 緑


// ========================================
// 4. 参照渡しで配列の値を変更
// ========================================

$numbers = [1, 2, 3, 4, 5];

// ❌ 通常のforeach（値は変更されない）
foreach ($numbers as $num) {
    $num = $num * 2;  // コピーに変更するだけ
}
print_r($numbers);  // [1, 2, 3, 4, 5] → 変更されていない

// ✅ 参照渡しのforeach（元の配列が変更される）
foreach ($numbers as &$num) {
    $num = $num * 2;  // 元の配列を変更
}
unset($num);  // ⚠️ 重要: 参照を解除する
print_r($numbers);  // [2, 4, 6, 8, 10] → 変更されている


// ========================================
// 5. 多次元配列のforeach
// ========================================

$users = [
    ['name' => '太郎', 'age' => 25],
    ['name' => '花子', 'age' => 30],
    ['name' => '次郎', 'age' => 22]
];

foreach ($users as $user) {
    echo "{$user['name']}さん（{$user['age']}歳）\n";
}
// 太郎さん（25歳）
// 花子さん（30歳）
// 次郎さん（22歳）


// ========================================
// 6. ネストしたforeach
// ========================================

$classes = [
    'クラスA' => ['太郎', '花子', '次郎'],
    'クラスB' => ['美咲', '健太', '愛'],
];

foreach ($classes as $className => $students) {
    echo "{$className}:\n";
    foreach ($students as $student) {
        echo "  - {$student}\n";
    }
}
// クラスA:
//   - 太郎
//   - 花子
//   - 次郎
// クラスB:
//   - 美咲
//   - 健太
//   - 愛


// ========================================
// 7. 実務例1: HTMLのセレクトボックス生成
// ========================================

$prefectures = [
    1 => '東京都',
    2 => '大阪府',
    3 => '北海道',
    4 => '沖縄県'
];

echo "<select name='prefecture'>\n";
foreach ($prefectures as $id => $name) {
    echo "  <option value='{$id}'>{$name}</option>\n";
}
echo "</select>\n\n";
// <select name='prefecture'>
//   <option value='1'>東京都</option>
//   <option value='2'>大阪府</option>
//   <option value='3'>北海道</option>
//   <option value='4'>沖縄県</option>
// </select>


// ========================================
// 8. 実務例2: 配列のフィルタリング
// ========================================

echo "【実務例2: 配列のフィルタリング】\n";
                                      
$products = [
    ['name' => 'ノートパソコン', 'price' => 80000, 'stock' => 5],
    ['name' => 'マウス', 'price' => 1500, 'stock' => 0],
    ['name' => 'キーボード', 'price' => 5000, 'stock' => 10],
    ['name' => 'モニター', 'price' => 30000, 'stock' => 0],
];

// 在庫がある商品のみを表示
echo "在庫がある商品:\n";
foreach ($products as $product) {
    if ($product['stock'] > 0) {
        echo "  {$product['name']}: {$product['price']}円（在庫{$product['stock']}個）\n";
    }
}
// 在庫がある商品:
//   ノートパソコン: 80000円（在庫5個）
//   キーボード: 5000円（在庫10個）


// ========================================
// 9. 実務例3: データの集計
// ========================================

$sales = [
    ['product' => 'りんご', 'amount' => 100],
    ['product' => 'バナナ', 'amount' => 150],
    ['product' => 'りんご', 'amount' => 200],
    ['product' => 'バナナ', 'amount' => 100],
];

$total = [];
foreach ($sales as $sale) {
    $product = $sale['product'];
    if (!isset($total[$product])) {
        $total[$product] = 0;
    }
    $total[$product] += $sale['amount'];
}

foreach ($total as $product => $amount) {
    echo "{$product}の合計: {$amount}円\n";
}
// りんごの合計: 300円
// バナナの合計: 250円


// ========================================
// 10. foreach vs for の使い分け
// ========================================

$data = ['A', 'B', 'C', 'D', 'E'];

// ✅ foreach: 配列の全要素を処理する場合（推奨）
echo "foreach: ";
foreach ($data as $value) {
    echo $value . " ";
}
echo "A B C D E ";

// ✅ for: インデックスが必要、または特定範囲のみ処理する場合
echo "for: ";
for ($i = 0; $i < count($data); $i++) {
    echo $data[$i] . " ";
}
echo "A B C D E ";


// ========================================
// 11. foreach内でのbreak/continue
// ========================================

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// continueの例: 偶数のみ処理
echo "偶数のみ: ";
foreach ($numbers as $num) {
    if ($num % 2 !== 0) {
        continue;  // 奇数はスキップ
    }
    echo $num . " ";
}
echo "2 4 ";

// breakの例: 条件で途中終了
echo "5未満: ";
foreach ($numbers as $num) {
    if ($num >= 5) {
        break;  // 5以上になったら終了
    }
    echo $num . " ";
}
echo "1 2 3 4 ";


// ========================================
// 12. 連想配列のキーのみ/値のみ取得
// ========================================

$config = [
    'host' => 'localhost',
    'port' => 3306,
    'database' => 'mydb'
];

// キーのみ取得
echo "キーのみ: ";
foreach (array_keys($config) as $key) {
    echo $key . " ";
}
echo "host port database ";

// 値のみ取得
echo "値のみ: ";
foreach (array_values($config) as $value) {
    echo $value . " ";
}
echo "localhost 3306 mydb ";


// ========================================
// 13. PHP 7.1以降: list()を使った分割代入
// ========================================

// 基本的な分割代入
$coordinates = [
    [10, 20],
    [30, 40],
    [50, 60]
];

foreach ($coordinates as [$x, $y]) {
    echo "X: {$x}, Y: {$y}\n";
}
// X: 10, Y: 20
// X: 30, Y: 40
// X: 50, Y: 60

// 連想配列の分割代入（PHP 7.1+）
$users = [
    ['id' => 1, 'name' => '太郎', 'email' => 'taro@example.com'],
    ['id' => 2, 'name' => '花子', 'email' => 'hanako@example.com'],
    ['id' => 3, 'name' => '次郎', 'email' => 'jiro@example.com']
];

foreach ($users as ['id' => $id, 'name' => $name, 'email' => $email]) {
    echo "ID: {$id}, 名前: {$name}, メール: {$email}\n";
}
// ID: 1, 名前: 太郎, メール: taro@example.com
// ID: 2, 名前: 花子, メール: hanako@example.com
// ID: 3, 名前: 次郎, メール: jiro@example.com

// 必要なキーのみ取得
foreach ($users as ['name' => $name, 'email' => $email]) {
    echo "{$name}: {$email}\n";
}
// 太郎: taro@example.com
// 花子: hanako@example.com
// 次郎: jiro@example.com

// 値のスキップ（不要な要素を無視）
$data = [
    [1, 2, 3, 4],
    [5, 6, 7, 8],
    [9, 10, 11, 12]
];

// 最初と最後の値だけ取得
foreach ($data as [$first, , , $last]) {
    echo "最初: {$first}, 最後: {$last}\n";
}
// 最初: 1, 最後: 4
// 最初: 5, 最後: 8
// 最初: 9, 最後: 12

// ネストした配列の分割代入
$locations = [
    ['東京', [35.6895, 139.6917]],
    ['大阪', [34.6937, 135.5023]],
    ['福岡', [33.5904, 130.4017]]
];

foreach ($locations as [$city, [$lat, $lng]]) {
    echo "{$city}: 緯度 {$lat}, 経度 {$lng}\n";
}
// 東京: 緯度 35.6895, 経度 139.6917
// 大阪: 緯度 34.6937, 経度 135.5023
// 福岡: 緯度 33.5904, 経度 130.4017

// 実務例: CSVデータの処理
$csvData = [
    ['2024-01-01', '商品A', 1000, 5],
    ['2024-01-02', '商品B', 2000, 3],
    ['2024-01-03', '商品C', 1500, 10]
];

echo "売上レポート:\n";
foreach ($csvData as [$date, $product, $price, $quantity]) {
    $total = $price * $quantity;
    echo "{$date} | {$product} | 単価: {$price}円 * {$quantity}個 = {$total}円\n";
}
// 売上レポート:
// 2024-01-01 | 商品A | 単価: 1000円 × 5個 = 5000円
// 2024-01-02 | 商品B | 単価: 2000円 × 3個 = 6000円
// 2024-01-03 | 商品C | 単価: 1500円 × 10個 = 15000円

// キーと値の両方を分割代入
$scores = [
    'math' => [80, 90, 75],
    'english' => [85, 88, 92],
    'science' => [78, 82, 88]
];

foreach ($scores as $subject => [$score1, $score2, $score3]) {
    $average = ($score1 + $score2 + $score3) / 3;
    echo "{$subject}: {$score1}, {$score2}, {$score3} (平均: " . round($average, 1) . ")\n";
}
// math: 80, 90, 75 (平均: 81.7)
// english: 85, 88, 92 (平均: 88.3)
// science: 78, 82, 88 (平均: 82.7)


// ========================================
// ⚠️ よくあるミスと注意点
// ========================================

/*
【注意1】参照渡し後のunset忘れ
    $array = [1, 2, 3];
    foreach ($array as &$value) {
        $value *= 2;
    }
    // unset($value);  // ← これを忘れると危険！
    
    foreach ($array as $value) {
        // 予期しない動作が起こる可能性
    }
    
    ✅ 解決策: 参照渡しのforeach後は必ずunset()

【注意2】foreach内で配列を変更
    $array = [1, 2, 3];
    foreach ($array as $value) {
        $array[] = $value * 2;  // ❌ 無限ループの危険！
    }
    
    ✅ 解決策: 別の配列に格納するか、先にコピーを作る

【注意3】キーの型に注意
    $array = ['1' => 'a', 1 => 'b'];  // '1'と1は同じキーとして扱われる
    
    ✅ PHPでは数値文字列のキーは数値に変換される

【注意4】パフォーマンス
    // ❌ 遅い
    for ($i = 0; $i < count($array); $i++) {
        // count()が毎回実行される
    }
    
    // ✅ 速い
    $length = count($array);
    for ($i = 0; $i < $length; $i++) {
        // count()は1回だけ
    }
    
    // ✅ foreachは最も速い（配列の全要素を処理する場合）
    foreach ($array as $value) {
        // 内部イテレータを使うため高速
    }
*/


// ========================================
// 💡 まとめ
// ========================================

/*
【foreachの使い分け】
    ✅ 配列の全要素を処理: foreach
    ✅ 連想配列の処理: foreach
    ✅ インデックスが不要: foreach
    ✅ シンプルで読みやすい: foreach
    
    ⚠️ 特定の範囲のみ処理: for
    ⚠️ 逆順で処理: for
    ⚠️ インデックスを使った複雑な処理: for

【基本パターン】
    foreach ($array as $value)           // 値のみ
    foreach ($array as $key => $value)   // キーと値
    foreach ($array as &$value)          // 参照渡し（要unset）
    foreach ($array as [$a, $b])         // 分割代入（PHP 7.1+）
*/
?>
