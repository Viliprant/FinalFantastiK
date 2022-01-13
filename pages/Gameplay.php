<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>FinalFantastiK</title>
</head>

<body>
    <div class="gameplay-container">
        <div id="game-view-container">
            <!-- PLAYER -->
            <div id="player-container">
                <img id="player-character" src="gifs/<?= $player->getPixelart() ?>.gif" alt="<?= $player->getPixelart() ?>">
                <div id="player-stats">
                    <div class="basics-stats">
                        <div class="stat">
                            <img src="gifs/stats/heart.gif" alt="">
                            <span><?= $player->getLifePoint() ?></span>
                        </div>
                        <div class="stat">
                            <img src="gifs/stats/shield.gif" alt="">
                            <span><?= $player->getArmor() ?></span>
                        </div>
                        <div class="stat">
                            <img src="gifs/stats/speed.gif" alt="">
                            <span><?= $player->getSpeed() ?></span>
                        </div>
                        <div class="stat">
                            <img src="gifs/stats/strength.gif" alt="">
                            <span><?= $player->getStrength() ?></span>
                        </div>
                    </div>
                    <div class="special-stats">
                        <div class="stat">
                            <img src="gifs/stats/unknown.png" alt="">
                            <span><?= $player->getFaith() ?></span>
                        </div>
                        <div class="stat">
                            <img src="gifs/stats/unknown.png" alt="">
                            <span><?= $player->getAgility() ?></span>
                        </div>
                        <div class="stat">
                            <img src="gifs/stats/unknown.png" alt="">
                            <span><?= $player->getMagic() ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="game-actions-container">
            <div class="player-skills">
                <span class="label-skill">Koup-Kraintif</span>
            </div>
            <?php
            foreach ($skills as $key => $skill) {
            ?>
                <div class="player-skills <?= $skill->getTimeLeft() > 0 ? "unavailable" : "" ?>">
                    <span class="label-skill"><?= $skill->getLabel() ?></span>
                    <?php if ($skill->getTimeLeft() > 0) {
                    ?>
                        <span class="skill-time-left"><?= $skill->getTimeLeft() ?></span>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>