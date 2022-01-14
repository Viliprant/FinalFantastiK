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
    <!-- STATE GAME -->
    <?php
    if ($game->getState() === false || $game->getState() === true) {
    ?>
        <div id="end">
            <p>Vous avez <?= $game->getState() ? "gagné" : "perdu" ?> ! </p>
        </div>
    <?php
    }
    ?>
    <a id="exit" href="index.php">Quitter</a>
    <!-- LAST HISTORY -->
    <?php
    if (isset($last_history) && !empty($last_history)) {
    ?>
        <input type="checkbox" id="history" hidden checked>
        <label id="history-container" for="history">
            <h2>Historique</h2>
            <ol>
                <?php
                foreach ($last_history as $key => $attack) {
                ?>
                    <li><?= $attack ?></li>
                <?php
                }
                ?>
            </ol>
        </label>
    <?php
    }
    ?>

    <!-- GAME -->
    <form method="POST" action="" class="gameplay-container">
        <div id="game-view-container">
            <!-- ENEMIES -->
            <div id="enemies-container">
                <?php
                foreach ($enemies as $key => $enemy) {
                ?>
                    <div>
                        <input type="radio" name="target" id="target<?= $key ?>" value="<?= $key ?>" hidden checked />
                        <label class="enemy-container" for="target<?= $key ?>">
                            <!-- STATS ENEMY -->
                            <div class="monster-stats">
                                <div class="basics-stats">
                                    <div class="stat">
                                        <img src="gifs/stats/heart.gif" alt="">
                                        <span><?= $enemy->getLifePoint() ?></span>
                                    </div>
                                    <div class="stat">
                                        <img src="gifs/stats/shield.gif" alt="">
                                        <span><?= $enemy->getArmor() ?></span>
                                    </div>
                                    <div class="stat">
                                        <img src="gifs/stats/speed.gif" alt="">
                                        <span><?= $enemy->getSpeed() ?></span>
                                    </div>
                                    <div class="stat">
                                        <img src="gifs/stats/strength.gif" alt="">
                                        <span><?= $enemy->getStrength() ?></span>
                                    </div>
                                </div>
                            </div>
                            <!-- ENEMY KARACTER -->
                            <div class="enemy-character">
                                <img src="gifs/<?= $enemy->getPixelart() ?>.gif" alt="<?= $enemy->getPixelart() ?>">
                                <div class="name-Karacter">
                                    <span class="bold capitalize"><?= $enemy->getName() ?></span>
                                    <span><?= get_class($enemy) ?></span>
                                </div>
                            </div>
                        </label>
                    </div>
                <?php
                }
                ?>
            </div>

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
                <button type="submit" name="player-attaK" value="<?= $skill->getId() ?>" class="player-skills <?= !$skill->isAvailable() ? "unavailable" : "" ?>" <?= !$skill->isAvailable() ? "disabled" : "" ?>>
                    <span class="label-skill"><?= $skill->getLabel() ?></span>
                    <?php if (!$skill->isAvailable()) {
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