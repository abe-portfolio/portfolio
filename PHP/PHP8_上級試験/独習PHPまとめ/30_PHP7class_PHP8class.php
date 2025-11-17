<?php
//番外編
// PHP7スタイルとPHP8スタイルの違い

// PHP7クラス
// プロパティをクラスの先頭で宣言し、__construct() の中で $this->プロパティ に値を代入
class TriangleFigure_7 { 
    // プロパティ
    public float $base;
    public float $height;

    // コンストラクタ
    public function __construct() {
        $this->base = 1;
        $this->height = 1; 
    }

    // メソッド
    public function getArea(): float {
        return $this->base * $this->height / 2;
    }
}


// PHP8クラス
// コンストラクタ引数で定義することで、プロパティ宣言・初期化・代入を自動的にPHPが行ってくれる
class TriangleFigure_8 {
    // プロパティ（コンストラクタ引数）
    public function __construct(
        public float $base = 1,
        public float $height = 1
    ) {}

    // メソッド
    public function getArea(): float {
        return $this->base * $this->height / 2;
    }
}


// *** $this について ***
/*
    $this が不要になるのは「プロパティ定義と初期化」の部分だけ
    $this は 「現在のインスタンス自身」 を表す変数。
    したがって、インスタンスのプロパティやメソッドを参照する際には、依然として $this が必要。

    getArea() の　return 部分での $this はインスタンスのプロパティを参照するため必要
    　=> $this が不要なのは「プロパティ定義と初期化」の部分だけ
*/
