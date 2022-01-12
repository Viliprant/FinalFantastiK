<?php

class Character
{
    private $life_point;
    private $action_point;

    public function __construct()
    {
    }

    public function AttaK(int $damages, Character $character)
    {
        $character->getDamages($damages);
    }

    public function getDamages(int $damages)
    {
        $this->life_point -= $damages;
    }

    public function getLife_point()
    {
        return $this->life_point;
    }

    public function getAction_point()
    {
        return $this->action_point;
    }
}
