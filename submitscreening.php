<?php

session_start();

$film   = $_POST['film'];
$date   = $_POST['date'];
$time   = $_POST['time'];
$screen = $_POST['screen'];
$maxt   = $_POST['maxtickets'];
$cert   = $_POST['cert'];

if (!isset($_SESSION[gatekeeper])) {
    echo "You cannot add a screening without logging in! <a href='index.php'>Login</a>";
} elseif ($_SESSION[admin] == 1) {
    //Connect to Database
    $conn      = new PDO('mysql:host=localhost;dbname=dcooper', 'dcooper', 'ree0OoCh');
    $statement = $conn->prepare("INSERT INTO filmshowings (film, date, time, screen, maxtickets, certificate) 
VALUES ( ?, ?, ?, ?, ?, ? );");
    $statement->bindParam(1, $film);
    $statement->bindParam(2, $date);
    $statement->bindParam(3, $time);
    $statement->bindParam(4, $screen);
    $statement->bindParam(5, $maxt);
    $statement->bindParam(6, $cert);
    $statement->execute();
    
    header('location: home.php');
} elseif ($_SESSION[admin] != 1) {
    echo "You don't have admin rights, this page is not accessable to you. Go <a href='home.php'>home</a>";
}

?>