<?php

/**
 * Value Objects and Mutability
 * Avoids primitive obsession - and readability
 * Helps with consistency and Imutability
 */


// instead of this
// function register(string $name, int $age) {}

class Age
{
    protected int $age;

    public function __construct(int $age)
    {
        if ($age < 0 || $age > 120) {
            throw new InvalidArgumentException("Age {$age} not valid.");
        }

        $this->age = $age;
    }

    public function increment(): Age
    {
        return new self($this->age + 1);
    }

    public function get(): int
    {
        return $this->age;
    }
}

function register(string $name, Age $age) {}

$age = new Age(119);
$age = $age->increment();

var_dump($age->get());

register('Pedro', $age);

// ----------------------------------------------

// instead of this

// function pin($x, $y) {} 
// function distance($x, $y, $x1, $y2) {}

class Coordinates
{
    public $x;
    public $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}

function pin(Coordinates $coordinates) {}
function distance(Coordinates $begin, Coordinates $end) {}
