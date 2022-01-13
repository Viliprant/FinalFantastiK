<?php

require_once("Character.php");


abstract class Player extends Character
{
    protected string $pseudo;
    protected int $level;

    public function __construct(int $id, int $lifePoint, int $speed, int $strength, int $armor, int $faith, int $magic, int $agility, array $skills, string $pseudo)
    {
        parent::__construct($id, $lifePoint, $speed, $strength, $armor, $faith, $magic, $agility, $skills);
        $this->pseudo = $pseudo;
        $this->level = 1;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function useSkill(string $label, array $enemies, Character $target = null)
    {
        if ($this->skills[$label]->getIsMultiTarget()) {
            foreach ($enemies as $enemy) {
                $this->attaK($this->skills[$label]->calculDamage($this), $enemy);
            }
        } else {
            $this->attaK($this->skills[$label]->calculDamage($this), $target);
        }
    }

    public function levelUp()
    {
        $this->level++;
    }
}
