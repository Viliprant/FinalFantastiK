<?php

require_once("classes/Game.php");

session_start();

$game = null;

if (isset($_SESSION['FinalFantastiK']) && !empty($_SESSION['FinalFantastiK'])) {
    $game = continueGame();
} else {
    $game = createNewGame();
}

$_SESSION['FinalFantastiK'] = $game;

$player = $game->getPlayer();

$skills = $player->getSkills();
$enemies = $game->getCurrentEnemies();

$last_history = $game->getLastHistory();


function createNewGame()
{
    $selected_k = $_POST["choice"];
    $pseudo = $_POST["pseudo"];
    return new Game($selected_k, $pseudo);
}

function continueGame()
{
    $game = $_SESSION['FinalFantastiK'];

    if (isset($_POST['player-attaK']) && !empty($_POST['player-attaK'])) {
        if (isset($_POST['target'])) {
            $game->handleTurn();
        }
    }

    return $game;
}

require_once("pages/Gameplay.php");
