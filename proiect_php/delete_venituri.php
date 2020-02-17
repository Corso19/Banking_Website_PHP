<?php
include 'classes/Connection.php';
include 'classes/DB.php';
include 'classes/Cheltuieli.php';

$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'proiect_php');

$sql = "DELETE FROM `venituri` WHERE `id`='$_GET[id]'";
if (mysqli_query($con, $sql)) {
    header('Location: main.php');
} else {
    echo "Not deleted";
}

header("Refresh:1; url=main.php");