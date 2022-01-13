<?php

require_once(__DIR__ . "/../Skill.php");

abstract class Character
{
    protected int   $lifePoint;
    protected int   $speed;
    protected int   $strength;
    protected int   $armor;
    /** 
     * @var Skill[] $skills
     */
    protected $skills; // Skill

    public function attaK(int $damages, Character $enemy)
    {
        $enemy->getDamages($damages);

        foreach ($this->skills as $key => $skill) {
            $skill->reducesTimeLeft();
        }
    }

    public abstract function useSkill(string $label, array $enemies); // Characters[] enemies

    public function getDamages(int $damages)
    {
        $this->lifePoint -= $damages;
    }

    public function punch(Character $enemy)
    {
        $this->attaK($this->getStrength(), $enemy);
    }

    public function getStrength()
    {
        return $this->strength;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getLifePoint()
    {
        return $this->lifePoint;
    }

    public function getArmor()
    {
        return $this->armor;
    }

    public function getSkills()
    {
        return $this->skills;
    }
}
