<?php

require_once("Character.php");


abstract class Player extends Character
{
    protected string $pseudo;
    protected int $level;

    public function __construct(int $id, int $lifePoint, int $speed, int $strength, int $armor, int $faith, int $magic, int $agility, array $skills, string $pseudo = "")
    {
        parent::__construct($id, $lifePoint, $speed, $strength, $armor, $faith, $magic, $agility, $skills);
        $this->pseudo = $pseudo;
        $this->level = 1;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function useSkill(int $id, array $enemies, Character $target = null)
    {

        $skill = $this->skills[array_search($id, $this->skills)];

        if ($skill->getIsMultiTarget()) {
            foreach ($enemies as $enemy) {
                $this->attaK($skill->calculDamage($this), $enemy);
            }
        } else {
            $this->attaK($skill->calculDamage($this), $target);
        }

        return $skill;
    }

    public function levelUp()
    {
        $this->level++;
    }
}
