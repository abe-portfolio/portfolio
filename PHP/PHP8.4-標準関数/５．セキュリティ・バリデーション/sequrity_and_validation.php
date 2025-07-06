<?php
/*  目次
1. password_hash
2. password_verify
3. filter_var
*/

// password_hash
// パスワードをハッシュ化
$hash = password_hash($data, PASSWORD_DEFAULT); 
// PASSWORD_DEFAULT：現在のPHPで推奨される最強のアルゴリズム（現在はbcrypt）

// password_verify
// ハッシュ照合
if (password_verify($data, $hash)) {
    echo "パスワードが一致しました";
}

// filter_var
// メール形式検証
if (filter_var($data, FILTER_VALIDATE_EMAIL)) { 
    echo "メールアドレスが有効です";
}
// 検証内容:
//    @ 記号の存在
//   ドメイン部分の形式
//   ローカル部分の文字制限
//   戻り値: 有効ならメールアドレス文字列、無効なら false
?>