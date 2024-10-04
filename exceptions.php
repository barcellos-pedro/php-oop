<?php

// Exceptions

class TeamException extends Exception
{
    public static function fromTooManyMembers()
    {
        return new static('You may not add more than 3 team members.');
    }
}

function add($one, $two)
{
    if (!is_float($one) || !is_float($two)) {
        throw new InvalidArgumentException('Please provide a float.');
    }

    return $one = $two;
}

try {
    echo add(2, []);
} catch (InvalidArgumentException $e) {
    echo "oh well." . PHP_EOL;
}

// ---------------------------------------------

class CourseVideo {}

class User
{
    public function download(CourseVideo $video)
    {
        if (!$this->subscribed()) {
            throw new Exception('You must be subscribed to download videos.');
        }
    }

    public function subscribed()
    {
        return false;
    }
}

class UserDownloadsController
{
    public function show()
    {
        try {
            (new User)->download(new CourseVideo);
        } catch (Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
    }
}

(new UserDownloadsController)->show();

// --------------------------------------------

class Member
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Team
{
    protected $members = [];

    public function add(Member $member)
    {
        if (count($this->members) === 3) {
            throw TeamException::fromTooManyMembers();
        }

        $this->members[] = $member;
    }

    public function members()
    {
        return $this->members;
    }
}

class TeamMembersController
{
    public function store()
    {
        $team = new Team;

        try {
            $team->add(new Member('John Doe'));
            $team->add(new Member('Jane Doe'));
            $team->add(new Member('Frank Doe'));
            $team->add(new Member('Susan Doe'));

            var_dump($team->members());
        } catch (TeamException $e) {
            echo $e->getMessage();
        }
    }
}

(new TeamMembersController)->store();
