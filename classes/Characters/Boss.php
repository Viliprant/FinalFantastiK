<?php

require_once("Monster.php");

final class Boss extends Monster
{
    public function __construct(int $id, int $lifePoint, int $speed, int $strength, int $armor, int $faith, int $magic, int $agility, array $skills, string $name)
    {
        parent::__construct($id, $lifePoint, $speed, $strength, $armor, $faith, $magic, $agility, $skills, $name);
    }
}
