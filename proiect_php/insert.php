<?php

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "proiect_php";

$conn = new mysqli($server, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

if ($_POST['option']==='+')  {
    $sql = "INSERT INTO venituri (title,value) VALUES ('".$_POST['title']."', '". $_POST['value']."')";
} elseif ($_POST['option'] === '-') {
    $sql = "INSERT INTO cheltuieli (title,value) VALUES ('" . $_POST['title'] . "', '" . $_POST['value'] . "')";
}

if ($conn->query($sql) === TRUE) {
    echo "<h3> succcess </h3>";
} else {
    echo "<h3> Failed </h3>";
}

header("Refresh:1; url=main.php");
