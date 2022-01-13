<?php
require_once("./classes/Database.php");

class Game
{
    private $player;
    private array $enemies;
    private Boss $boss;
    private array $currentEnemies;
    private array $choicesKaracter;
    private Character $selectedKaracter;

    public function __construct() {
        $db = new Database();
        $db->init();
        $this->choicesKaracter = $db->getKaracters("Player");
        $this->enemies = $db->getKaracters("Monster");
        
        $this->boss = $db->getKaracters("Boss")[0];
        // var_dump($karacters);

        // $enemy = $this->enemies[array_rand($this->enemies)];
    }

    public function getPlayer()
    {
        return $this->player;
    }

    public function getEnemies()
    {
        return $this->enemies;
    }

    public function getCurrentEnemies()
    {
        return $this->currentEnemies;
    }

    public function addToCurrentEnemies($currentEnemy)
    {
        return $this->currentEnemies[] = $currentEnemy;
    }
}
