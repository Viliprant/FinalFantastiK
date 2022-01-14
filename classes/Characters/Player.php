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

    public function useSkill(int $id, array $enemies, Monster $target = null)
    {
        if ($id == -1) {
            $this->punch($target);
            return "Attaque Punch, c'est très peu efficace ! L'ADVERSAIRE SE MOQUE DE VOUS ! MOUAHAHAHHA !";
        } else {
            $skills = array_filter($this->skills,  fn ($skill) => $skill->getID() == $id);;
            $skill = $skills[array_key_first($skills)];

            if ($skill->getIsMultiTarget()) {
                $damage = $skill->calculDamage($this);
                foreach ($enemies as $enemy) {
                    $this->attaK($damage, $enemy);
                }

                return "Attaque " . $skill->getLabel() . " sur tout les ennemies ! WOW ";
            } else {
                $dmg = $skill->calculDamage($this);
                $this->attaK($dmg, $target);
            }
        }

        return "Attaque " . $skill->getLabel() . " sur " . $target->getName() . " pour " . $dmg . " dégats";
    }

    public function levelUp()
    {
        $this->level++;
    }
}
