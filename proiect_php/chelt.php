<?php

include 'classes/Connection.php';
include 'classes/Cheltuieili.php';
include 'classes/Html.php';

?>

<!DOCTYPE html>
<html lang="ro">

<head>

    <meta charset="UTF-8">
    <title>Budget App</title>
    <link rel="shortcut icon" href="./storage/icon.png" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="./css/index-style.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600" rel="stylesheet" type="text/css">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="container">
        <?php
        $cheltuieli = new Cheltuieli(new Html);

        $cheltuieli->showAll();
        ?>
    </div>