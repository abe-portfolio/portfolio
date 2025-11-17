<?php
// 抽象メソッド：継承されてオーバーライドされることを前提とした空のメソッド
// 抽象クラス：抽象メソッドを含むクラス

abstract class Animal {
    abstract public function makeSound(): string;
}

class Dog extends Animal {
    public function makeSound(): string {
        return 'Woof';
    }
}

$dog = new Dog();
echo $dog->makeSound(); // Woof



