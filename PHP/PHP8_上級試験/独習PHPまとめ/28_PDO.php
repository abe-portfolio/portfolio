<?php
$dsn = 'mysql:host=localhost;dbname=mydb;charset=utf8';
$username = 'admin';
$password = 'root';

// DBへの接続
try {
    $db = new PDO($dsn, $username, $password);
    print 'DB接続成功';
} catch (PDOException $e) {
    die("DB接続エラー: {$e->getMessage()}");
} finally {
    $db = null;
    print 'DB接続を解除';
}
// PDOException はm Exception クラスのサブクラスで、PDO用の例外クラス


// 接続パラメータ
/*
オプション名　　　　　　　説明
======================================================================
PDO::ATTR_AUTOCOMMIT    自動コミットの有効／無効　　　
PDO::ATTTR_TIMEOUT      接続タイムアウトの時間（秒）
PDO::ATTR_CASE          カラム名の大文字／小文字の変換
　　　PDO::CASE_LOWER　         小文字に変換
　　　PDO::CASE_UPPER　         大文字に変換
　　　PDO::CASE_NATURAL　       変換しない（デフォルト）
PDO::ATTR_PERSISTENT    永続接続の有効／無効
PDO::ATTR_ERRMODE       エラーモード
  　　PDO::ERRMODE_SILENT　     エラー時にエラーコードを返す（デフォルト）
　　　PDO::ERRMODE_WARNING　    エラー時に警告を発生させる
　　　PDO::ERRMODE_EXCEPTION　  エラー時に例外を発生させる
PDO::ATTR_SERVER_VERSION サーバーのバージョン情報
PDO::ATTR_CLIENT_VERSION クライアントのバージョン情報
PDO::ATTR_SERVER_INFO    サーバーの情報
PDO::ATTR_CLIENT_INFO    クライアントの情報
PDO::ATTR_DRIVER_NAME    ドライバーの名前
PDO::ATTR_ORACLE_NULLS   NULL値の処理
　　　PDO::NULL_NATURAL　       デフォルト（NULL値をそのまま返す）
　　　PDO::NULL_EMPTY_STRING　  空文字列をNULL値に変換
　　　PDO::NULL_TO_STRING　     NULL値を空文字列に変換
*/

// 接続パラメータの設定
// 方法１（インスタンス化時に設定）
$db = new PDO($dsn, $username, $password, [
    PDO::ATTR_CASE => PDO::CASE_UPPER,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => true,
    PDO::ATTR_ORACLE_NULLS => PDO::NULL_NATURAL,
]);

// 方法２（個別に設定）
$db2 = new PDO($dsn, $username, $password);
$db2->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);



// SQL文の実行（「:名前」の形を取る記述 = プレースホルダー）
$sttr = $db->prepare('INSERT INTO book(isbn, title, price) VALUES (:isbn, :title, :price)');
// $sttr = $db->query('SELECT * FROM book'); でも実行可（固定のSQL文の場合に有効）

// プリペアドステートメントの実行（プレースホルダーに値を代入）
$$sttr->bindValue(':isbn', $_POST['isbn']);
$$sttr->bindValue(':title', $_POST['title']);
$$sttr->bindValue(':price', $_POST['price']);

// プリペアドステートメントの実行
$$sttr->execute();



// オートインクリメント
$db->lastInsertId();


// フェッチ = 結果を取得すること
// fetch() 1行ずつ取得
$sttr = $db->query('SELECT * FROM book');
while ($rows = $sttr->fetch(PDO::FETCH_ASSOC)) {
    print_r($rows);
}

// フェッチモード
/*
PDO::FETCH_ASSOC   連想配列で取得
PDO::FETCH_NUM     数値配列で取得
PDO::FETCH_BOTH    連想配数値配列で取得
PDO::FETCH_LAZY    オブジェクトで取得
PDO::FETCH_OBJ     オブジェクトで取得
PDO::FETCH_BOUND   バインドされた変数に代入
PDO::FETCH_COLUMN  カラムの値を取得
*/


// fetchAll() 全ての結果を取得し、配列で返す
$rows = $sttr->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);
/* 例：
    Array(
        [0] => Array( [isbn] => 978-4-7981-6364-2 [title] => PHP入門 [price] => 2500 )
        [1] => Array( [isbn] => 978-4-7981-6365-9 [title] => PHPデータベース入門 [price] => 3000 )
    )
*/


// fetchColumn() カラムの値を取得
$sttr = $db->query('SELECT * FROM book');
while ($rows = $sttr->fetchColumn(0)) {
    print $rows.'<br>';
}
print "件数：{$sttr->fetchColumn()}件";
/* 例：
    978-4-7981-6364-2
    978-4-7981-6365-9
    件数：2件
*/


// fetchObject() fetchした結果を指定のオブジェクトのプロパティにセット
$sttr = $db->query('SELECT * FROM book');
while ($rows = $sttr->fetchObject('BookClass')) {
    print "{$rows->isbn} {$rows->title} {$rows->price}<br>";
}
/* 例：
    978-4-7981-6364-2 PHP入門 2500
    978-4-7981-6365-9 PHPデータベース入門 3000
*/



// bindColumn() カラムの値を変数にセット
try {
    // DBとの接続を確立
    $pdo = new PDO($dsn, $username, $password);

    // プリペアドステートメントを作成
    $stmt = $pdo->prepare('SELECT * FROM book WHERE id = ?');
    $sttr->bindValue(1, $_GET['id'] ?: 1);
    $sttr->execute();

    // 取得列と変数をマッピング
    $stmt->bindColumn('type', $type, PDO::PARAM_STR);
    $stmt->bindColumn('data', $data, PDO::PARAM_LOB);

    // 結果を取得
    if ($stmt->fetch(PDO::FETCH_BOUND)) {
        header("Content-Type: {$type}");
        print $data;
    } else {
        // 該当するレコードが存在しない場合
        print '該当するデータが存在しません';
    }
} catch (PDOException $e) {
    print "エラー: {$e->getMessage()}";
}

// bindColumn()のパラメータ
/*
PDO::PARAM_STR  文字列
PDO::PARAM_INT  整数
PDO::PARAM_LOB  バイナリデータ
PDO::PARAM_BOOL 真偽値
PDO::PARAM_NULL NULL
PDO::PARAM_LOB  バイナリデータ
PDO::PARAM_LOB  バイナリデータ
*/



// bindParam() プレースホルダーに値を代入
try {
    $pdo = new PDO($dsn, $username, $password);
    // プリペアドステートメントを作成
    $stmt = $pdo->prepare('UPDATE book SET title = :title WHERE id = :id');
    // プレースホルダーにバインドする変数を紐づけ
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
} catch (PDOException $e) {
    die("エラー: {$e->getMessage()}");
}



// トランザクション
try {
    $pdo = new PDO($dsn, $username, $password);
    // トランザクションを開始
    $pdo->beginTransaction();
    // 今回はプレースホルダを作成しないのでprepare()ではなくexec()
    $pdo->exec('UPDATE book SET title = "PHP入門" WHERE id = 1');
    $pdo->exec('UPDATE book SET title = "PHPデータベース入門" WHERE id = 2');
    $pdo->commit();
} catch (PDOException $e) {
    $pdo->rollBack();
    die("エラー: {$e->getMessage()}");
}
?>