<?php
// インターフェース：複数のクラスに“同じ操作（メソッド）を必ず持たせるための設計上の約束ごと”
/*
インターフェースが与える強制力
    インターフェースは、次のルールを コンパイル時（実行前）に強制 します
    「このインターフェースを実装するクラスは、必ず○○というメソッドを持て」
    PHPであれば、指定メソッドが未実装だと即エラー

設計の一貫性 → 結果としてポリモーフィズムが生まれる
    インターフェースは「同じ名前のメソッドの存在」を強制するだけですが、その副作用として、
    “どのクラスが来ても同じメソッド名で扱える” ＝ ポリモーフィズムが実現される。


*/

// インターフェース：設計の一貫性を強制
interface NotifierInterface {
    public function send(string $message): void;
}

// 実装①：メール通知
class EmailNotifier implements NotifierInterface {
    public function send(string $message): void {
        echo "[Email] {$message}\n";
    }
}

// 実装②：LINE通知
class LineNotifier implements NotifierInterface {
    public function send(string $message): void {
        echo "[LINE] {$message}\n";
    }
}

// 実装③：Slack通知
class SlackNotifier implements NotifierInterface {
    public function send(string $message): void {
        echo "[Slack] {$message}\n";
    }
}

// 利用側：ポリモーフィズムの恩恵で、種類によらず同じ呼び出し方で済む
function notifyUser(NotifierInterface $notifier, string $msg): void {
    $notifier->send($msg);
}

// --- 実行例 --- //
notifyUser(new EmailNotifier(), "Hello!");
notifyUser(new LineNotifier(),  "こんにちは！");
notifyUser(new SlackNotifier(), "通知テスト");

