<?php
session_start();

$id = $_GET[bookingID];
if (!isset($_SESSION[gatekeeper])) {
    echo "<h1 class='filml'>You cannot view this page without logging in!<h1>";
}

$conn   = new PDO('mysql:host=localhost;dbname=dcooper', 'dcooper', 'ree0OoCh');
$update = $conn->query("DELETE FROM mybookings WHERE ID='$id' AND '$_SESSION[gatekeeper]' = username ;");

header('location: mybookings.php');

?>