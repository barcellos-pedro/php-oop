<?php

// Encapsulation => Enclose within a capsule

class Person
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function job()
    {
        return 'Worker';
    }

    private function worries()
    {
        return 'Bills';
    }
}

// Change visibility using Reflection API
// $method = new ReflectionMethod(Person::class, 'worries');
// $method->setAccessible(true);
// var_dump($method->invoke($bob));

$bob = new Person('Bob');

// we can update class internal state
// beacause of public fields
var_dump($bob->name);
$bob->name = null;
var_dump($bob->name);

var_dump($bob->job());

// we can't access private fields/methods
// from outside the class
// var_dump($bob->worries());


// ----------------------------------------

class TennisMatch
{
    protected $playerOne;

    // public API
    public function score()
    {
        // is there a winner
        // does someone have an advantage
        // are they in deuce
    }

    // public = outside and instance
    // private = instance only
    // protected = instance and children

    // getter
    public function playerOne()
    {
        return $this->playerOne;
    }

    // internal extracted methods
    protected function hasWinner() {}
    protected function hasAdvantage() {}
    protected function inDeuce() {}
}
