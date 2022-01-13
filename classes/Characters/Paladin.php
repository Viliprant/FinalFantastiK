<?php

require_once("Player.php");

final class Paladin extends Player
{
    protected int     $lifePoint = 25;
    protected int     $speed = 3;
    protected int     $strength = 6;
    protected int     $armor = 4;

    protected int     $faith = 4;

    public function __construct(string $pseudo, array $skills)
    {
        parent::__construct($pseudo);
        $this->skills = $skills;
    }

    public function getDamages(int $damages)
    {
        $reducedDamages = $damages - $this->armor;
        $this->lifePoint -= $reducedDamages;
    }

    public function getFaith()
    {
        return $this->faith;
    }

    public function levelUp()
    {
        $this->lifePoint += 1;
        $this->speed += 1;
        $this->strength += 1;
        $this->armor += 1;
        $this->faith += 1;
    }
}
