<?php

require_once('classes/Database.php');

session_start();

if (isset($_SESSION['FinalFantastiK']) && !empty($_SESSION['FinalFantastiK'])) {
    unset($_SESSION['FinalFantastiK']);
}

Database::init();
$choices = Database::getKaracters("Player");

?>
<div class="select-k">
    <form method="POST" action="game.php">
        <h1>Choisir un <span class="K">K</span>aracter</h1>
        <div class="pseudo-input">
            <label for="pseudo">Pseudo</label>
            <input type="text" id="pseudo" name="pseudo" required autocomplete="off" autofocus />
        </div>
        <?php
        foreach ($choices as $K) {
        ?>
            <div class="choice-karacter">
                <input type="radio" id="<?= get_class($K) ?>" name="choice" value="<?= get_class($K) ?>" hidden checked>
                <label for="<?= get_class($K) ?>">
                    <span><?= get_class($K) ?></span>
                    <!-- <div class="pixelart <?= $K->getPixelart() ?>"></div> -->
                    <img src="gifs/<?= $K->getPixelart() ?>.gif" alt="<?= $K->getPixelart() ?>" />
                </label>

            </div>
        <?php
        }
        ?>
        <input type="submit" value="Choisir" />
    </form>
</div>