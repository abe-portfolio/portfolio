<?php
// 変数の代入は値渡しが規定だが、オブジェクト変数だけは参照私が規定になっている

class Person {
    public string $firstName;
    public string $lastName;
  
    public function __construct (string $firstName, string $lastName) {
      $this->firstName = $firstName;
      $this->lastName = $lastName;
    }
  
    public function show() : void {
      print "<p>ボクの名前は{$this->lastName}{$this->firstName}です。</p>";
    }
  
    public function __toString() : string {
      return $this->lastName.$this->firstName;
    }
  
    public function __debugInfo() : array {
        return [
            '名' => $this->firstName,
            '性' => $this->lastName
        ];
    }
}

$p1 = new Person('太郎', '山田');
// $p2 = $p1;  // 参照渡しのため、以下の $p2 に対する代入が $p1 に対しても反映されてしまう（$p1 も $p2 も同じ内容になる）
$p2 = clone $p1; // オブジェクトの複製（値渡し）
$p2->firstName = '花子';
$p2->lastName = '田中';
print_r($p1); // 名前：太郎、性：山田
print_r($p2); // 名前：花子、性：田中


// なお、cloneで複製されたインスタンスは厳密な比較ではfalseを返す
/*
    参照渡しの場合：
        $p2 = $1;
        var_dump($p1 == $p2); // true
        var_dump($p1 === $p2); // true

    cloneによる複製の場合：
        $p2 = clone $p1;
        var_dump($p1 == $p2); // true
        var_dump($p1 === $p2); // false　　*内容が同じでも、各オブジェクト変数が指すインスタンスは別物であるため
*/









