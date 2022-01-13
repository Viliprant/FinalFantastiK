<?php
require_once('classes/Game.php');
require_once('classes/Database.php');

$game = new Game();
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
            <?php
            foreach ($game->getCurrentEnemies() as $enemy) {
            ?> <div class="enemy <?= $enemy->getSprite() ?>"><?= $enemy->getName() ?></div> <?php
                                                                                            }
                                                                                                ?>
        </div>

        <div class="player">
            <div class="player-name"><?= $game->getPlayer()->getPseudo() ?> </div>
            <div class="pixelart-medusa"></div>
            <div class="skills">
                <?php foreach ($game->getPlayer()->getSkills() as $skill) {
                    echo '<div class="skill ' . $skill->isAvailable() . '">' . $skill->getLabel() . '</div>';
                }
                ?>
            </div>

        </div>


    </div>



</body>

</html>