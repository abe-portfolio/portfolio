<?php
/*
トレイト（trait）とは
　・PHPでは「単一継承」しかできない。
　・つまり、1つのクラスは1つの親クラスしか継承できない。
　・しかし、複数のクラスで共通のメソッドを使いたいときに便利なのが「トレイト」。
　・トレイトはクラスのようにメソッドをまとめておいて、
　・必要なクラスに use キーワードで「差し込む」ことで、そのメソッドをクラス内で使えるようにする。
*/

trait Greeting {
    public function sayHello() {
        echo "こんにちは！";
    }
}

class User {
    use Greeting; // ← トレイトを取り込む
}

$user = new User();
$user->sayHello(); // 出力：こんにちは！



// insteadof キーワード：トレイトのメソッド名が競合した場合に、どちらのメソッドを使うかを指定する
// as キーワード       ：トレイトのメソッド名が競合した場合に、別名を付けて利用する
trait Greeting2 {
    public function sayHello() {
        echo "こんにちは！（Greeting2）";
    }
}

trait Greeting3 {
    public function sayHello() {
        echo "Hello! (Greeting3)";
    }
}

class User2 {
    use Greeting2, Greeting3 {
        Greeting2::sayHello insteadof Greeting3; // Greeting3 側を無効化
        Greeting3::sayHello as sayHi;            // Greeting3 のメソッドに別名を付けて利用
    }
}

$user2 = new User2();
$user2->sayHello(); // 出力：こんにちは！（Greeting2）
echo PHP_EOL;
$user2->sayHi();    // 出力：Hello! (Greeting3)



