<?php
require_once("./classes/Database.php");

class Game
{
    private Player $player;
    private array $enemies;
    private array $boss;
    private array $currentEnemies;
    private int $level = 3;

    public function __construct($selected, $pseudo)
    {
        Database::init();
        $this->setPlayer(Database::getKaracters("Player"), $selected, $pseudo);

        $this->enemies = Database::getKaracters("Monster");

        $this->boss = Database::getKaracters("Boss");

        $this->addToCurrentEnemies();
    }

    public function getPlayer()
    {
        return $this->player;
    }

    public function getLevel()
    {
        return $this->level;
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

    public function addToCurrentEnemies()
    {
        if ($this->level % 3 == 0) {
            $this->currentEnemies[] = $this->boss[array_rand($this->boss)];
        } else {
            for ($i = 0; $i < ($this->level % 3); $i++) {
                $this->currentEnemies[] = $this->enemies[array_rand($this->enemies)];
            }
        }
    }
}
