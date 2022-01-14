<?php
require_once("./classes/Database.php");

class Game
{
    private Player $player;
    private array $enemies;
    private array $boss;
    private array $currentEnemies;
    private int $level = 3;
    private array $history = [];

    public function __construct($selected, $pseudo)
    {
        Database::init();
        $this->setPlayer(Database::getKaracters("Player"), $selected, $pseudo);

        $this->enemies = Database::getKaracters("Monster");

        $this->boss = Database::getKaracters("Boss");

        $this->addToCurrentEnemies();
    }

    public function handleTurn()
    {
        $history_turn = [];
        $ingame_karacters = array_merge([$this->player], $this->currentEnemies);
        usort($ingame_karacters, fn ($k1, $k2) => $k1->getSpeed() >= $k2->getSpeed() ? -1 : 1);
        foreach ($ingame_karacters as $karacter) {
            if ($karacter instanceof Player) {
                $target = $this->getCurrentEnemies()[$_POST['target']];
                $attak = $this->getPlayer()->useSkill($_POST['player-attaK'], $this->getCurrentEnemies(), $target);
                $history_turn[] = $attak;
            } else {
                $target = $this->player;
                $attak = $karacter->useSkill($target);
                $history_turn[] = $attak;
            }
        }

        $this->addToHistory($history_turn);
    }

    public function getPlayer()
    {
        return $this->player;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function getLastHistory()
    {
        if ($this->history) {
            return $this->history[array_key_last($this->history)];
        }

        return null;
    }

    public function addToHistory($attak)
    {
        $this->history[] = $attak;
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
                $this->currentEnemies[] = clone $this->enemies[array_rand($this->enemies)];
            }
        }
    }
}
