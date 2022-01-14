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
    <form method="POST" action="" class="gameplay-container">
        <div id="game-view-container">
            <!-- PLAYER -->
            <div id="player-container">
                <!-- GIF KARACTER -->
                <div id="player-character">
                    <img src="gifs/<?= $player->getPixelart() ?>.gif" alt="<?= $player->getPixelart() ?>">
                    <div class="name-Karacter">
                        <span class="bold capitalize"><?= $player->getPseudo() ?></span>
                        <span><?= get_class($player) ?></span>
                        <span>Lvl <?= $player->getLevel() ?></span>
                    </div>
                </div>
                <!-- STATS -->
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
                            <img src="gifs/stats/faith.png" alt="">
                            <span><?= $player->getFaith() ?></span>
                        </div>
                        <div class="stat">
                            <img src="gifs/stats/ability.png" alt="">
                            <span><?= $player->getAgility() ?></span>
                        </div>
                        <div class="stat">
                            <img src="gifs/stats/magic.png" alt="">
                            <span><?= $player->getMagic() ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ACTIONS -->
        <div id="game-actions-container">
            <!-- Koup par défaut -->
            <button type="submit" value="-1" name="player-attaK" class="player-skills">
                <span class="label-skill">Koup-Kraintif</span>
            </button>
            <?php
            foreach ($skills as $key => $skill) {
            ?>
                <!-- Skills -->
                <button type="submit" name="player-attaK" value="<?= $skill->getId() ?>" class="player-skills <?= $skill->getTimeLeft() > 0 ? "unavailable" : "" ?>" <?= $skill->getTimeLeft() > 0 ? "disabled" : "" ?>>
                    <span class="label-skill"><?= $skill->getLabel() ?></span>
                    <?php if ($skill->getTimeLeft() > 0) {
                    ?>
                        <span class="skill-time-left"><?= $skill->getTimeLeft() ?></span>
                    <?php
                    }
                    ?>
                </button>
            <?php
            }
            ?>
        </div>
    </form>
</body>

</html>