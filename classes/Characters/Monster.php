<?php

require_once("Character.php");

class Monster extends Character
{
    protected string    $name;

    public function __construct(int $id, int $lifePoint, int $speed, int $strength, int $armor, int $faith, int $magic, int $agility, array $skills, string $name)
    {
        parent::__construct($id, $lifePoint, $speed, $strength, $armor, $faith, $magic, $agility, $skills);
        $this->name = $name;
        $this->pixelart = "pixelart-" . $this->name;
    }

    public function getName()
    {
        return $this->name;
    }
}
