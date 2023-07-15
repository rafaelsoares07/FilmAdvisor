<?php
require_once("db.php");
require_once("globals.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.css" integrity="sha512-lp6wLpq/o3UVdgb9txVgXUTsvs0Fj1YfelAbza2Kl/aQHbNnfTYPMLiQRvy3i+3IigMby34mtcvcrh31U50nRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="shortcut icon" href="img/movies/moviestar.ico" type="image/x-icon">

    <link rel="stylesheet" href="<?=$BASE_URL?>css/styles.css">
    <title><?= isset($titlePage) ? $titlePage : 'FlixAdvion' ?></title>
</head>