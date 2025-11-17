<?php
declare(strict_types=1);

/**
 * 親クラス: Account
 */
class Account
{
    /**
     * アクセス修飾子 protected なので子クラスから参照可能
     * PHP8 のコンストラクタプロモーションで同時に定義
     */
    public function __construct(
        protected string $owner,
        protected int $balance = 0,
    ) {
    }

    /**
     * 共通の入金ロジック
     */
    public function deposit(int $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException('Deposit must be positive.');
        }
        $this->balance += $amount;
    }

    /**
     * 共通の出金ロジック
     */
    public function withdraw(int $amount): void
    {
        if ($amount > $this->balance) {
            throw new RuntimeException('Insufficient balance.');
        }
        $this->balance -= $amount;
    }

    /**
     * 子クラスにオーバーライドさせたいメソッド
     */
    public function summary(): string
    {
        return "{$this->owner}: {$this->balance}円";
    }
}

/**
 * 子クラス: PremiumAccount
 * - 無料振込回数を追加
 * - summary メソッドをオーバーライド
 */
class PremiumAccount extends Account
{
    /**
     * 追加プロパティ freeTransfers を持たせつつ
     * 親コンストラクタを呼び出す例
     */
    public function __construct(
        string $owner,
        int $balance = 0,
        private int $freeTransfers = 3,
    ) {
        parent::__construct($owner, $balance);
    }

    /**
     * 新しいメソッド: 任意の Account に送金し、
     * 無料枠を超えると手数料を徴収
     */
    public function transfer(Account $to, int $amount): void
    {
        $this->withdraw($amount);
        $to->deposit($amount);

        if ($this->freeTransfers > 0) {
            $this->freeTransfers--;
            return;
        }

        // 無料枠を超えたら100円手数料
        $this->withdraw(100);
    }

    /**
     * 親メソッドを呼び出しつつ、独自表示を追加
     */
    public function summary(): string
    {
        $base = parent::summary();
        return "{$base} (無料振込残り: {$this->freeTransfers}回)";
    }
}

$alice = new Account('Alice', 5_000);
$bob = new PremiumAccount('Bob', 20_000);

$alice->deposit(2_000);          // 親クラスのメソッドを利用
$bob->transfer($alice, 3_000);   // 子クラス固有のメソッド

echo $alice->summary(), PHP_EOL; // 親クラスの表示
echo $bob->summary(), PHP_EOL;   // オーバーライド後の表示




// final修飾子
// メソッドやクラスに付けることで、オーバーライドや継承を禁止する
class FinalClass {
    public final function test() {
        return 'test';
    }
}
/*
class FinalClassChild extends FinalClass {
    public function test() {    // ❌ エラー
        return 'test';
    }
}
*/
