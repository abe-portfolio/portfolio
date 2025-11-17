<?php
// アクセス修飾子
/*
public      ：クラス内、クラス外からアクセス可能
            　インターフェース（窓口）であり、クラスの利用者（外部）からアクセスさせたい情報や処理
protected   ：クラス内、クラスの継承先からアクセス可能
            　サブクラス（子クラス）でも使わせたいが、外部からは隠したい（共通の内部処理やロジックを継承先に渡すとき）
private     ：クラス内からのみアクセス可能
            　クラスの中だけで扱う「内部データ」や「内部処理」（継承しても使えない）
*/

// public
class UserPublic {
    public $name;

    public function greeting() {
        return "こんにちは、{$this->name}さん！";
    }
}

$user = new UserPublic();
$user->name = '山田';          // 外部からアクセスして設定
echo $user->greeting();        // 外部から呼び出し可能

// -----------------------------------------------------------------------

// protected
class UserProtected {
    protected $role = '一般ユーザー';

    protected function getRole() {
        return $this->role;
    }
}

class AdminUser extends UserProtected {
    public function showRole() {
        return "権限：{$this->getRole()}";
    }
}

$admin = new AdminUser();
// echo $admin->getRole(); // ❌ 外部からは不可
echo $admin->showRole();   // ✅ 継承先からは呼び出せる

// -----------------------------------------------------------------------

// private
class UserPrivate {
    private $email;

    public function setEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("不正なメールアドレスです");
        }
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }
}

$user = new UserPrivate();
$user->setEmail("yamada@example.com");
// $user->email = "test"; // ❌ 直接代入は不可
echo $user->getEmail();         // ✅ getter 経由でアクセス

?>