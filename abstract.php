<?php

// Abstract classes

abstract class AchievementType
{
    // default methods already implemented
    // this logic will be the same across all chidren
    public function name()
    {
        $class = (new ReflectionClass($this))->getShortName();
        return trim(preg_replace('/[A-Z]/', ' $0', $class));
    }

    public function icon()
    {
        return strtolower(str_replace(' ', '-', $this->name())) . '.png';
    }

    // the children must implement this method
    // with its specific business logic
    abstract public function qualifier($user);
}

class FirstThousandPoints extends AchievementType
{
    public function qualifier($user) {} // TBD
}


class FirstBestAnswer extends AchievementType
{
    public function qualifier($user) {} // TBD
}

class ReachTop50 extends AchievementType
{
    public function qualifier($user)
    {
        return 'yes';
    }
}

// Cannot instantiate abstract class
// $achievement = new AchievementType();

$achievements = [
    new ReachTop50(),
    new FirstBestAnswer(),
    new FirstThousandPoints()
];

foreach ($achievements as $achievement) {
    var_dump("Name: {$achievement->name()} | Icon: {$achievement->icon()}");
    var_dump('Qualify? ' . $achievement->qualifier('Some User'));
    echo PHP_EOL;
}
