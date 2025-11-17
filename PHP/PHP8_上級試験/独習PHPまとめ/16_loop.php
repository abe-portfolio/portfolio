<?php

// ========================================
// for文の式の省略パターン
// ========================================

/*
for (初期化式; 継続条件式; 増減式) {
    // 処理
}

✅ すべての式を個別に省略可能
❌ セミコロンは省略できない（必ず2つ必要）
*/


// ========================================
// 1. 初期化式のみ省略（実務でよくある）
// ========================================

// すでに変数が初期化されている場合
$i = 5; // 他の関数から値を取得したと想定

for (; $i < 10; $i++) {
    echo $i . " ";
}
echo "\n出力: 5 6 7 8 9\n\n";


// ========================================
// 2. 増減式のみ省略
// ========================================

// ループ内で複雑な増減をする場合
for ($i = 0; $i < 10;) {
    echo $i . " ";
    
    if ($i % 2 === 0) {
        $i++; // 偶数なら+1
    } else {
        $i += 2; // 奇数なら+2
    }
}
echo "\n出力: 0 1 3 5 7 9\n\n";


// ========================================
// 3. 継続条件式のみ省略（無限ループ）
// ========================================
for ($i = 0; ; $i++) {
    echo $i . " ";
    
    if ($i >= 5) {
        break; // ループ内でbreakする
    }
}
echo "\n出力: 0 1 2 3 4 5\n\n";


// ========================================
// 4. 複数を省略（初期化式と増減式）
// ========================================
$i = 0;
for (; $i < 5;) {
    echo $i . " ";
    $i++;
}
echo "\n出力: 0 1 2 3 4\n\n";


// ========================================
// 5. すべて省略（無限ループ）
// ========================================
$count = 0;
for (;;) {
    echo $count . " ";
    $count++;
    
    if ($count >= 3) {
        break;
    }
}
echo "\n出力: 0 1 2\n\n";


// ========================================
// 実務的な使用例
// ========================================

// 例1: 外部から初期値を受け取る
function processData($startIndex, $data) {
    // 初期化式を省略
    for (; $startIndex < count($data); $startIndex++) {
        echo $data[$startIndex] . " ";
    }
    echo "\n";
}

$dataArray = ['A', 'B', 'C', 'D', 'E'];
$start = 2; // 前回の続きから処理すると想定
processData($start, $dataArray);
echo "出力: C D E（インデックス2から開始）\n\n";


// 例2: 複雑な継続条件
echo "【実務例2: 複雑な継続条件】\n";

function attemptConnection($attempt) {
    // 3回目で成功すると仮定
    return $attempt >= 3;
}

$i = 0;
$maxRetries = 5;
$success = false;

// 初期化式を省略、条件は複雑
for (; $i < $maxRetries && !$success; $i++) {
    echo "接続試行 " . ($i + 1) . "回目...\n";
    $success = attemptConnection($i);
    if (!$success) {
        echo "失敗。再試行します。\n";
    }
}

if ($success) {
    echo "接続成功！（" . $i . "回目で成功）\n\n";
} else {
    echo "接続失敗（最大試行回数に達しました）\n\n";
}


// 例3: ループ内で動的に増減
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// 増減式を省略し、ループ内で動的に制御
for ($i = 0; $i < count($array);) {
    echo $array[$i] . " ";
    
    if ($array[$i] % 3 === 0) {
        $i += 2; // 3の倍数なら2つスキップ
    } else {
        $i++; // それ以外は1つ進む
    }
}
echo "\n出力: 1 2 3 5 6 8 9 10（3の倍数の後は2つスキップ）\n\n";


// ========================================
// 6. ネストが深い場合の脱出方法
// ========================================

// ❌ 問題: break n; は可読性が低い
$found = false;
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        for ($k = 0; $k < 3; $k++) {
            if ($i === 1 && $j === 1 && $k === 1) {
                echo "ターゲット発見: i={$i}, j={$j}, k={$k}\n";
                break 3; // 3階層抜ける（わかりにくい）
            }
        }
    }
}
echo "処理完了\n\n";


// ✅ 解決策1: goto句を使用
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 5; $j++) {
        for ($k = 0; $k < 5; $k++) {
            echo "チェック中: i={$i}, j={$j}, k={$k}\n";
            
            if ($i === 2 && $j === 2 && $k === 2) {
                echo "条件に一致しました！\n";
                goto endLoop; // ラベルに直接ジャンプ
            }
        }
    }
}

endLoop: // ラベル定義
echo "ループを抜けました\n\n";


// ✅ 解決策2: フラグ変数を使用（従来の方法）
$found = false;
for ($i = 0; $i < 3 && !$found; $i++) {
    for ($j = 0; $j < 3 && !$found; $j++) {
        for ($k = 0; $k < 3 && !$found; $k++) {
            if ($i === 1 && $j === 1 && $k === 1) {
                echo "発見: i={$i}, j={$j}, k={$k}\n";
                $found = true; // フラグを立てる
            }
        }
    }
}
echo "検索完了\n\n";


// ========================================
// 7. ループを関数に切り分けてreturnで抜ける
// ========================================

// ✅ 最も推奨される方法: 関数に切り分け
function findTargetInMatrix($matrix, $target) {
    foreach ($matrix as $i => $layer) {
        foreach ($layer as $j => $row) {
            foreach ($row as $k => $value) {
                echo "チェック中: [{$i}][{$j}][{$k}] = {$value}\n";
                
                if ($value === $target) {
                    return ['i' => $i, 'j' => $j, 'k' => $k, 'value' => $value];
                }
            }
        }
    }
    return null; // 見つからなかった場合
}

// 3次元配列でテスト
$matrix = [
    [
        [1, 2, 3],
        [4, 5, 6],
    ],
    [
        [7, 8, 9],
        [10, 11, 12],
    ]
];

$result = findTargetInMatrix($matrix, 8);
if ($result !== null) {
    echo "ターゲット発見: [{$result['i']}][{$result['j']}][{$result['k']}] = {$result['value']}\n";
} else {
    echo "ターゲットが見つかりませんでした\n";
}
echo "\n";


// 実務例1: ユーザー検索
function findUserByEmail($users, $searchEmail) {
    foreach ($users as $department => $departmentUsers) {
        foreach ($departmentUsers as $team => $teamMembers) {
            foreach ($teamMembers as $user) {
                if ($user['email'] === $searchEmail) {
                    // 見つかったらすぐreturn
                    return [
                        'department' => $department,
                        'team' => $team,
                        'user' => $user
                    ];
                }
            }
        }
    }
    return null;
}

$company = [
    '営業部' => [
        'チームA' => [
            ['name' => '太郎', 'email' => 'taro@example.com'],
            ['name' => '花子', 'email' => 'hanako@example.com']
        ],
        'チームB' => [
            ['name' => '次郎', 'email' => 'jiro@example.com']
        ]
    ],
    '開発部' => [
        'チームX' => [
            ['name' => '美咲', 'email' => 'misaki@example.com'],
            ['name' => '健太', 'email' => 'kenta@example.com']
        ]
    ]
];

echo "--- 実務例1: ユーザー検索 ---\n";
$result = findUserByEmail($company, 'kenta@example.com');
if ($result) {
    echo "見つかりました:\n";
    echo "  部署: {$result['department']}\n";
    echo "  チーム: {$result['team']}\n";
    echo "  名前: {$result['user']['name']}\n";
    echo "  メール: {$result['user']['email']}\n";
}
echo "\n";


// 実務例2: 在庫チェック
function checkStockAvailability($warehouses, $productId, $requiredQuantity) {
    foreach ($warehouses as $warehouseName => $areas) {
        foreach ($areas as $areaName => $shelves) {
            foreach ($shelves as $shelfId => $products) {
                foreach ($products as $product) {
                    if ($product['id'] === $productId && $product['quantity'] >= $requiredQuantity) {
                        // 在庫が見つかったら即座にreturn
                        return [
                            'found' => true,
                            'warehouse' => $warehouseName,
                            'area' => $areaName,
                            'shelf' => $shelfId,
                            'quantity' => $product['quantity']
                        ];
                    }
                }
            }
        }
    }
    return ['found' => false];
}

$warehouses = [
    '東京倉庫' => [
        'エリアA' => [
            'A-1' => [
                ['id' => 'P001', 'quantity' => 5],
                ['id' => 'P002', 'quantity' => 10]
            ],
            'A-2' => [
                ['id' => 'P003', 'quantity' => 15]
            ]
        ],
        'エリアB' => [
            'B-1' => [
                ['id' => 'P001', 'quantity' => 20],
                ['id' => 'P004', 'quantity' => 8]
            ]
        ]
    ],
    '大阪倉庫' => [
        'エリアC' => [
            'C-1' => [
                ['id' => 'P001', 'quantity' => 50]
            ]
        ]
    ]
];

echo "--- 実務例2: 在庫チェック ---\n";
$stockCheck = checkStockAvailability($warehouses, 'P001', 15);
if ($stockCheck['found']) {
    echo "在庫あり:\n";
    echo "  倉庫: {$stockCheck['warehouse']}\n";
    echo "  エリア: {$stockCheck['area']}\n";
    echo "  棚番号: {$stockCheck['shelf']}\n";
    echo "  在庫数: {$stockCheck['quantity']}個\n";
} else {
    echo "必要な在庫が見つかりませんでした\n";
}
echo "\n";


// gotoの実務例: エラーハンドリング
echo "--- gotoの実務例: リソース解放 ---\n";

function processFile($filename) {
    $file = null;
    $connection = null;
    $transaction = null;
    
    // ファイルを開く
    $file = @fopen($filename, 'r');
    if (!$file) {
        echo "エラー: ファイルを開けません\n";
        goto cleanup;
    }
    echo "ファイルを開きました\n";
    
    // データベース接続（仮）
    $connection = true; // 実際はDB接続処理
    if (!$connection) {
        echo "エラー: DB接続失敗\n";
        goto cleanup;
    }
    echo "DB接続成功\n";
    
    // トランザクション開始（仮）
    $transaction = true;
    if (!$transaction) {
        echo "エラー: トランザクション開始失敗\n";
        goto cleanup;
    }
    echo "トランザクション開始\n";
    
    // 正常処理
    echo "データ処理中...\n";
    echo "処理成功！\n";
    
    cleanup:
    // リソース解放（必ず実行される）
    if ($transaction) {
        echo "トランザクションをコミット\n";
    }
    if ($connection) {
        echo "DB接続をクローズ\n";
    }
    if ($file) {
        fclose($file);
        echo "ファイルをクローズ\n";
    }
}

// 一時ファイルを作成してテスト
$tempFile = sys_get_temp_dir() . '/test_goto.txt';
file_put_contents($tempFile, 'test data');
processFile($tempFile);
unlink($tempFile);
echo "\n";


// ========================================
// 💡 まとめ
// ========================================

/*
【省略可能な式】
    ✅ 初期化式: 省略可能（外部で変数を初期化する場合に便利）
    ✅ 継続条件式: 省略可能（省略すると無限ループ、true扱い）
    ✅ 増減式: 省略可能（ループ内で複雑な制御をする場合）
    ❌ セミコロン: 必須（2つとも）

【実務での使い分け】
    - 初期化式の省略: 関数の引数や他の処理結果を開始値として使う場合
    - 増減式の省略: ループ内で条件に応じて増減量を変える場合
    - 継続条件式の省略: ループ内でbreakする無限ループパターン

【書き方の例】
    for (;;)        // すべて省略
    for (; $i < 10; $i++)  // 初期化式のみ省略
    for ($i = 0; $i < 10;) // 増減式のみ省略
    for ($i = 0; ; $i++)   // 継続条件式のみ省略

【深いネストからの脱出方法】
    ❌ break n;        // 可読性が低い、保守性が悪い
    ⚠️ goto句         // 限定的に使用（エラーハンドリング、リソース解放）
    ✅ 関数に分割      // 最も推奨（returnで即座に抜ける）
    ✅ フラグ変数      // 従来の方法（安全だが冗長）

【関数分割の利点】
    1. 可読性の向上: 処理の意図が明確になる
    2. 再利用性: 同じロジックを複数箇所で使える
    3. テスト容易性: 単体テストがしやすい
    4. 保守性: ループの階層が変わっても影響を受けにくい
*/

?>

