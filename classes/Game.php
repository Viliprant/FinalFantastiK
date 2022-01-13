<?php
require_once("./classes/Database.php");

class Game
{
    private Player $player;
    private array $enemies;
    private Boss $boss;
    private array $currentEnemies;

    public function __construct($selected, $pseudo)
    {
        Database::init();
        $this->setPlayer(Database::getKaracters("Player"), $selected, $pseudo);

        $this->enemies = Database::getKaracters("Monster");
        $this->addToCurrentEnemies($this->enemies[0]);
    }

    public function getPlayer()
    {
        return $this->player;
    }

    public function setPlayer($allKaracters, $selected, $pseudo)
    {
        foreach ($allKaracters as $k) {
            if ($k instanceof $selected) {
                $this->player = $k;
            }
        }

        $this->player->setPseudo($pseudo);
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
