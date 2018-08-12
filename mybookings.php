<?php
session_start();

if (!isset($_SESSION[gatekeeper])) {
    echo "<h1 class='filml'>You cannot view this page without logging in!<h1>";
} else {
    echo "<!DOCTYPE html>";
    
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='utf-8'>";
    echo "<link href='SC.css' rel='stylesheet' type='text/css'>";
    echo "<title> Solent Cinemas </title>";
    echo "</head>";
    echo "<body>";
    echo "<header>";
    echo "<div class='logo'>";
    echo "<a href='home.php'><img class='logo' alt='SClogo' src='Images/SolentCinemas.png'/></a>";
    echo "<fieldset>";
    echo "<legend>Search for film</legend>";
    echo "<form  method='post' action='sresults.php'>";
    echo "<input name='search'>";
    echo "<input type='submit' name='submit' value='Search'/>";
    echo "</form>";
    echo "</fieldset>";
    echo "<p class='logout'> You're logged in as $_SESSION[gatekeeper]. <a href='logout.php'> Logout</a></p>";
    echo "</div>";
    echo "</header>";
    echo "<div class='listing'>";
    $conn    = new PDO('mysql:host=localhost;dbname=dcooper', 'dcooper', 'ree0OoCh');
    $results = $conn->query("SELECT m.ID ,m.ntickets, f.film, f.poster, f.date, f.time, f.screen FROM mybookings m, filmshowings f WHERE username = '$_SESSION[gatekeeper]' AND f.ID = m.showingID ;");
    while ($row = $results->fetch()) {
        echo "<form method='get' action='removebooking.php'><input type='hidden' value='$row[ID]' name='bID'</input></form>";
        echo "<table class='filmd'>";
        echo "<tr>";
        echo "<th> $row[film] </th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>$row[poster]</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Date: $row[date]</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Time: $row[time]</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Screen: $row[screen]</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>No of tickets: $row[ntickets]</td>";
        echo "</tr>";
        echo "<tr><td>Booking ID: sc$row[ID]</td></tr>";
        echo "<td><a href='removebooking.php?bookingID=$row[ID]'>Cancel Booking</a></td>";
        echo "</tr>";
        echo "</table>";
        
        
    }
    echo "</div>";
    echo "<h1 class='filml'> Here are your bookings $_SESSION[gatekeeper]. <a href='home.php'> Home</a></h1>";
    echo "<footer>";
    if ($_SESSION[admin] == 1) {
        echo "<p><a href='addscreening.php'>Click here</a> to add a screening $_SESSION[gatekeeper]</p>";
    }
    echo "<p>Copyright© SolentCinemas 2016</p>";
    echo "</footer>";
    echo "</body>";
    echo "</html>";
    echo "</body>";
    echo "</html>";
}