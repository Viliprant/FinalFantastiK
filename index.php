<?php
require_once('classes/Database.php');

$db = new Database();
$db->init();
$choices = $db->getKaracters("Player");
?>

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

    <?php require_once("pages/Select.php") ?>

</body>

</html>