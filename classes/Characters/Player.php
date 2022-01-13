<?php

require_once("Character.php");


abstract class Player extends Character
{
    protected string $pseudo;

    public function __construct(string $pseudo)
    {
        $this->pseudo = $pseudo;
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
                $this->attaK($this->skills[$label]->calculDamages($this), $enemy);
            }
        } else {
            $this->attaK($this->skills[$label]->calculDamages($this), $target);
        }
    }

    public abstract function levelUp();
}
