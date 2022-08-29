<?php

abstract class Animal {
    private $name;
    public abstract function speak();
    public function getName() { echo $this->name; }
    }
    class Dog extends Animal {
    public function speak() { echo 'Woof!'; }
    }
    $dog1 = new Dog();
    var_dump($dog1);
    // $dog1->$name = 'Pavle';
    // var_dump($dog1->$name);

    // $dog1->getName();
    $dog1->speak();