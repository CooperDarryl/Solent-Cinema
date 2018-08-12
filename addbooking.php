<?php
session_start();
if (!isset($_SESSION[gatekeeper])) {
    echo "<h1 class='filml'>You cannot view this page without logging in!<h1>";
}
$user      = $_SESSION['gatekeeper'];
$fid       = $_POST['fID'];
$tickets   = $_POST['rtickets'];
$maxt      = $_POST['maxtickets'];
$newticket = ($maxt - $tickets);

if ($tickets <= $maxt) {
    $conn      = new PDO('mysql:host=localhost;dbname=dcooper', 'dcooper', 'ree0OoCh');
    $update    = $conn->query("UPDATE filmshowings SET maxtickets='$newticket' WHERE ID = '$fid' ;");
    $statement = $conn->prepare("INSERT INTO mybookings (username, showingID, ntickets) VALUES (?, ?, ?);");
    $statement->bindParam(1, $user);
    $statement->bindParam(2, $fid);
    $statement->bindParam(3, $tickets);
    $statement->execute();
    
    header('location: mybookings.php');
} else {
    echo "<h1> You have requested too many tickets. Try booking again. <a href='home.php'>Home</a></h1>";
}

?>