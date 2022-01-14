<?php

require_once("Character.php");

class Monster extends Character
{
    protected string    $name;

    public function __construct(int $id, int $lifePoint, int $speed, int $strength, int $armor, int $faith, int $magic, int $agility, array $skills, string $name)
    {
        parent::__construct($id, $lifePoint, $speed, $strength, $armor, $faith, $magic, $agility, $skills);
        $this->name = $name;
        $this->pixelart = "pixelart-" . $this->name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function useSkill(Player $target)
    {
        $available_skills = array_filter($this->skills, fn ($skill) => $skill->isAvailable());
        if (empty($available_skills)) {
            $this->punch($target);
            return "L'ennemi tente de vous mettre un petit Koup de poinK de MERDE";
        } else {
            $skill = $available_skills[array_rand($available_skills)];
            $dmg = $skill->calculDamage($this);
            $this->attaK($dmg, $target);
            return "Attaque " . $skill->getLabel() . " sur " . $target->getPseudo() . " pour " . $dmg . " dégats";
        }
    }
}
