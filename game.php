<?php

require_once("classes/Game.php");

$selected_k = $_POST["choice"];
$pseudo = $_POST["pseudo"];

$game = new Game($selected_k, $pseudo);

$player = $game->getPlayer();

$skills = $player->getSkills();

require_once("pages/Gameplay.php");
