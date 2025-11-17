<?php
// staticメソッド または クラスメソッド （インスタンス化しなくてもメソッドの使用が可能になる）
class StaticMethod {
    public static function greeting() {
        return print("Hello");
    }
}

StaticMethod::greeting(); // Hello
/*
    もしインスタンス化させて記述するなら以下になる
    $static = new StaticMethod();
    $static->greeting(); // Hello


    staticメソッドを使うべき判断基準
        １．インスタンス（個体）ごとの状態を使わない処理（ユーティリティクラス）
        ２．定数操作
        ３．ファクトリメソッド（インスタンス生成の仕方をメソッドにまとめたもの）
        　　=>コンストラクタをprivateにして直接newできないようにする (private function __construct(...) {...} )
            =>ファクトリメソッドを実装（public static function ...）
            
*/
