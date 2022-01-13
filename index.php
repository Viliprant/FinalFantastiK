<?php
require_once('classes/Game.php');

$game = new Game("Paladin");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>FinalFantastiK</title>
</head>

<body>

    <div class="game">

        <div class="enemies">

        </div>

        <div class="player">

            <div class="name"><?= $game->getPlayer()->getPseudo() ?> </div>
            <div class="sprite"></div>
            <div class="skills">
                <?php foreach ($game->getPlayer()->getSkills() as $skill) {
                    echo '<div class="skill ' . $skill->isAvailable() . '">' . $skill->getLabel() . '</div>';
                }
                ?>
            </div>

        </div>


    </div>

    <div class="pixelart-medusa"></div>

</body>

</html>