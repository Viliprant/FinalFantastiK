<?php

require_once("Player.php");

final class Wizard extends Player
{
    public function __construct(int $id, int $lifePoint, int $speed, int $strength, int $armor, int $faith, int $magic, int $agility, array $skills, string $pseudo = "")
    {
        parent::__construct($id, $lifePoint, $speed, $strength, $armor, $faith, $magic, $agility, $skills, $pseudo);
    }

    public function levelUp()
    {
        parent::levelUp();
        $this->magic++;
    }
}
