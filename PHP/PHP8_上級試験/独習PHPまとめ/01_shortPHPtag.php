<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <?php echo 'Hello World'; ?> -->
    <!-- 省略した書き方（PHP7.4以降で使用可能） -->
    <?= 'Hello World'; ?>
</body>
</html>


echo と print の違い
    １：戻り値の有無
        $result = echo "Hello";  // ❌ エラー (echoは戻り値を返さない)
        $result = print "Hello"; // ✅ $result に 1 が代入される

    ２：引数を複数指定できるか
        echo "A", "B", "C";   // ✅ OK (カンマ区切りで複数出力)
        print "A", "B", "C";  // ❌ エラー (1つしか受け取れない)

    
    💡 実用的な例
        echo の典型例
            $name = "Taro";
            echo "Hello, ", $name, "!"; // Hello, Taro!

        print の典型例
            $is_logged_in = true;
            print $is_logged_in ? "Welcome!" : "Please log in."; // Welcome! または Please log in.
