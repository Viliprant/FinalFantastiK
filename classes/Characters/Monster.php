<?php

require_once("Character.php");

class Monster extends Character
{
    protected int       $id;
    protected string    $name;
    protected string    $sprite;

    public function __construct(string $name = "gobelin", $sprite = "gobelin.png")
    {
        $this->name = $name;
        $this->sprite = $sprite;
    }

    public function useSkill(string $label, array $enemies)
    {
    } // Characters[] enemies
}
