<?php
$str = 'WINGSプロジェクト';

// mb_strlen：文字列の長さを取得
print mb_strlen($str); // 11


// mb_convert_case：文字列の大文字・小文字を変換
print mb_convert_case($str, MB_CASE_UPPER); // WINGSプロジェクト
print mb_convert_case($str, MB_CASE_LOWER); // wingsプロジェクト
print mb_convert_case($str, MB_CASE_TITLE); // Wingsプロジェクト


// mb_substr：文字列の一部を取得
print mb_substr($str, 0, 5); // WINGS
print mb_substr($str, 5); // プロジェクト
print mb_substr($str, 5, -4); // プロ
print mb_substr($str, -6, 2); // プロ


// mb_strstr：文字列の検索
print mb_strstr($str, 'S', true); // WING
print mb_strstr($str, 'S', false); // Sプロジェクト


// str_contains：文字列に指定した文字列が含まれているかを判定
print str_contains($str, 'プロジェクト'); // true
print str_contains($str, 'M'); // false


// str_starts_with：文字列の先頭が指定した文字列から始まるかを判定
print str_starts_with($str, 'WINGS'); // true
print str_starts_with($str, 'wings'); // false


// str_ends_with：文字列の末尾が指定した文字列から終わるかを判定
print str_ends_with($str, 'プロジェクト'); // true
print str_ends_with($str, 'WINGS'); // false


// str_replace：文字列の置換
print str_replace('プロジェクト', 'Project', $str); // WINGSProject


// explode：文字列の分割
print explode(' ', $str); // ['WINGS', 'プロジェクト']


// mb_strpos/mb_strrpos：文字列の位置を取得
$str2 = 'あいうえおあいうえお';
print mb_strpos($str2, 'い'); // 1
print mb_strrpos($str2, 'い'); // 7


// mb_substr_count：文字列の出現回数を取得
print mb_substr_count($str2, 'い'); // 2


// trim/ltrim/rtrim：文字列の前後の空白を削除
print trim('  Hello  ');  // "Hello"    *分かりやすいように"で囲む
print ltrim('  Hello  '); // "Hello  "  *分かりやすいように"で囲む
print rtrim('  Hello  '); // "  Hello"  *分かりやすいように"で囲む


// printf：書式指定で文字列を出力
//    %s は引数の値を文字列に変換して出力
printf('Hello %s %s', 'World', 'PHP'); // Hello World PHP
//    引数を任意の順で出力
printf('Hello %2$s %1$s', 'World', 'PHP'); // Hello PHP World


// mb_convert_kana：文字列のカナを変換
//    k：カタカナをひらがなに変換 <=> K：ひらがなをカタカナに変換
print mb_convert_kana('アイウエオ', 'k'); // ｱｲｳｴｵ
print mb_convert_kana('ｱｲｳｴｵ', 'K'); // アイウエオ
//    n：数字を全角に変換 <=> N：数字を半角に変換
print mb_convert_kana('１２３４５', 'n'); // 12345
print mb_convert_kana('12345', 'N'); // １２３４５
//    a：全角英字を半角英字に変換 <=> A：半角英字を全角英字に変換
print mb_convert_kana('１Ａ２Ｂ３Ｃ４Ｄ５Ｅ', 'a'); // 1A2B3C4D5E
print mb_convert_kana('1A2B3C4D5E', 'A'); // １Ａ２Ｂ３Ｃ４Ｄ５Ｅ
//    h：全角英字を半角英字に変換 <=> H：半角英字を全角英字に変換
print mb_convert_kana('あいうえお', 'h'); // ｱｲｳｴｵ
print mb_convert_kana('ｱｲｳｴｵ', 'H'); // あいうえお
//    r：全角英字を半角英字に変換 <=> R：半角英字を全角英字に変換
print mb_convert_kana('ＡＢＣＤＥ', 'r'); // ABCDE
print mb_convert_kana('ABCDE', 'R'); // ＡＢＣＤＥ


// mb_convert_encoding：文字列のエンコーディングを変換
//    from：変換前のエンコーディング（例：UTF-8）
//    to：変換後のエンコーディング（例：EUC-JP）
print mb_convert_encoding('あいうえお', 'EUC-JP', 'UTF-8'); // あいうえお


// mb_strimwidth：文字列の幅を調整
//    str：対象の文字列
//    start：開始位置
//    width：幅
//    trimmarker：省略時に末尾へ追加する文字(例：...)
//    encoding：エンコーディング
print mb_strimwidth('あいうえおかきくけこ', 0, 10, '...', 'UTF-8'); // あいう...


// mb_send_mail：メールを送信    *php.iniの設定が必要
//    to：送信先メールアドレス
//    subject：メールの件名
//    message：メールの本文
//    headers：メールのヘッダー
mb_send_mail('test@example.com', 'メールの件名', 'メールの本文', 'From: test@example.com');
?>