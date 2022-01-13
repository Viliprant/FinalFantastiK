<?php

require_once(__DIR__ . "/../Skill.php");

abstract class Character
{
    protected int   $id;
    protected int   $lifePoint;
    protected int   $speed;
    protected int   $strength;
    protected int   $armor;
    protected int   $faith;
    protected int   $magic;
    protected int   $agility;
    protected string   $pixelart;
    /** 
     * @var Skill[] $skills
     */
    protected $skills; // Skill


    public function __construct(int $id, int $lifePoint, int $speed, int $strength, int $armor, int $faith, int $magic, int $agility, array $skills)
    {
        $this->id = $id;
        $this->lifePoint = $lifePoint;
        $this->speed = $speed;
        $this->strength = $strength;
        $this->armor = $armor;
        $this->skills = $skills;
        $this->faith = $faith;
        $this->magic = $magic;
        $this->agility = $agility;
        $this->pixelart = "pixelart-" . get_class($this);
    }

    public function attaK(int $damages, Character $enemy)
    {
        $enemy->getDamages($damages);

        foreach ($this->skills as $key => $skill) {
            $skill->reducesTimeLeft();
        }
    }

    public function punch(Character $enemy)
    {
        $this->attaK($this->getStrength(), $enemy);
    }

    public function getDamages(int $damages)
    {
        $reducedDamages = $damages - $this->armor;

        if ($reducedDamages < 0) {
            $reducedDamages = 0;
        }

        $this->lifePoint -= $reducedDamages;
    }

    public function getLifePoint()
    {
        return $this->lifePoint;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getStrength()
    {
        return $this->strength;
    }

    public function getArmor()
    {
        return $this->armor;
    }

    public function getFaith()
    {
        return $this->faith;
    }

    public function getMagic()
    {
        return $this->magic;
    }

    public function getAgility()
    {
        return $this->agility;
    }

    public function getPixelart()
    {
        return $this->pixelart;
    }

    public function getSkills()
    {
        return $this->skills;
    }

    public function setSkills(array $skills)
    {
        $this->skills = $skills;
    }

    public function getId()
    {
        return $this->id;
    }
}
