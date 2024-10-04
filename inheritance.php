<?php

// Inheritance

class CoffeeMaker
{
    public function brew()
    {
        var_dump('brewing the coffee');
    }
}

// "is a"
class SpecialtyCoffeeMaker extends CoffeeMaker
{
    public function brewLatte()
    {
        var_dump('brewing a latte');
    }
}

(new CoffeeMaker)->brew();

$special = new SpecialtyCoffeeMaker;
$special->brew();
$special->brewLatte();

// -----------------------------------------------------

class Collection
{
    protected array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function sum($key)
    {
        // or array_sum(array_column($this->items, $key));
        return array_sum(array_map(fn($item) => $item->$key ?? 0, $this->items));
    }

    public function size()
    {
        return count($this->items);
    }
}

// "is a"
class VideosCollection extends Collection
{
    function length()
    {
        return $this->sum('length');
    }
}

class Video
{
    public $title;
    public $length;

    public function __construct($title, $length)
    {
        $this->title = $title;
        $this->length = $length;
    }
}

$videos = new VideosCollection([
    new Video('Some Video 1', 100),
    new Video('Some Video 2', 200),
    new Video('Some Video 3', 300),
]);

var_dump($videos);
var_dump('Videos: ' . $videos->size());
// var_dump('Sum: ' . $videos->sum('length'));
var_dump('Total videos length: ' . $videos->length() . ' minutes');
