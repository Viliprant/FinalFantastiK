<?php

final class Thief extends Player
{
    protected int     $lifePoint = 25;
    protected int     $speed = 7;
    protected int     $strength = 3;
    protected int     $armor = 4;

    protected int     $agility = 7;

    public function __construct($pseudo)
    {
        parent::__construct($pseudo);
    }

    public function getDamages(int $damages)
    {
        $reducedDamages = $damages - $this->armor;
        $this->lifePoint -= $reducedDamages;
    }

    public function getKick()
    {
        return $this->kick;
    }

    public function levelUp()
    {
        $this->lifePoint += 1;
        $this->speed += 1;
        $this->strength += 1;
        $this->armor += 1;
        $this->kick += 1;
    }
}
