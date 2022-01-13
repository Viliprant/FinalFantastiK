<?php

require_once("Player.php");

final class Wizard extends Player
{
    protected int       $lifePoint = 15;
    protected int       $speed = 5;
    protected int       $strength = 2;
    protected int       $armor = 1;

    protected int       $magic = 6;

    public function __construct($pseudo)
    {
        parent::__construct($pseudo);
    }

    public function getDamages(int $damages)
    {
        $reducedDamages = $damages - $this->shield;
        $this->lifePoint -= $reducedDamages;
    }

    public function getMagic()
    {
        return $this->magic;
    }

    public function levelUp()
    {
        $this->lifePoint += 1;
        $this->speed += 1;
        $this->strength += 1;
    }
}
