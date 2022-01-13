<?php
require_once("./classes/Characters/Player.php");
require_once("./classes/Characters/Monster.php");
require_once("./classes/Characters/Boss.php");
require_once("./classes/Characters/Paladin.php");

class Game
{
    private $player;
    private array $enemies;
    private Boss $boss;

    public function __construct(string $class)
    {
        $this->player = new $class('Sarah', []);
        $this->enemies[] = new Monster("gobelin", 'pixelart-gobelin');
        $this->enemies[] = new Monster("gobelin", 'pixelart-gobelin');
        $this->enemies[] = new Monster("gobelin", 'pixelart-gobelin');
        $this->boss = new Boss("Dragon", "pixelart-dragon");
    }

    public function getPlayer()
    {
        return $this->player;
    }

    public function getEnemies()
    {
        return $this->enemies;
    }
}
