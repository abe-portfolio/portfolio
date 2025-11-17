<?php
// マルチキャッチ
/*  
<冗長化している例>
try {
    ... 任意のコード ...
} catch (HogeException $e) {
    print "HogeException: {$e->getMessage()}\n";
} catch (FooException $e) {
    print "FooException: {$e->getMessage()}\n";
} catch (BarException $e) {
    print "BarException: {$e->getMessage()}\n";
}

       ↓ 修正後 ↓

<「|」を使って列挙する>
try {
    ... 任意のコード ...
} catch (HogeException | FooException | BarException $e) {
    print "Error: {$e->getMessage()}\n";
}
*/




// throw キーワード：例外を発生させる
throw new Exception('エラーメッセージ');
/*
    この例では「Exception」を投げているが、実際のExceptionクラスはツリー構造でもっと詳しい〇〇Exceptionがあるため、
    親であるExceptionだけを throw および catch することは望ましくない。
*/




// assert 文：条件式がfalseの場合に例外を発生させる 
// privateメソッドで使用する（private は“外部入力のエラー”ではなく“内部バグ”が問題になるから）
// 設定により、本番環境では無効化できる（try catchは本番でも実行される）
//     zend.assertions=0
//     assert.active=0
class UserScore
{
    private int $score = 0;

    public function addScore(int $value): void
    {
        assert($value > 0, 'score must be positive'); // 本番環境では無効化できる
        $this->score += $value;
    }

    private function calcBonus(): int
    {
        assert($this->score >= 0, 'score must not be negative'); // 本番環境では無効化できる
        return intdiv($this->score, 10);
    }
}

$user = new UserScore();
$user->addScore(10);

