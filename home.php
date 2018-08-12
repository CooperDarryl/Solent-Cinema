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
    echo "<img class='logo' alt='SClogo' src='Images/SolentCinemas.png'/>";
    echo "<fieldset>";
    echo "<legend>Search for film</legend>";
    echo "<form  method='post' action='sresults.php'>";
    echo "<input name='search'>";
    echo "<input type='submit' name='submit' value='Search'/>";
    echo "</form>";
    echo "</fieldset>";
    echo "<p class='logout'> You're logged in as $_SESSION[gatekeeper]. <a href='logout.php'> Logout</a></p><p><a href='mybookings.php'>My Bookings</a></p>";
    echo "</div>";
    echo "</header>";
    echo "<div class='listing'>";
    $conn    = new PDO('mysql:host=localhost;dbname=dcooper', 'dcooper', 'ree0OoCh');
    $results = $conn->query('SELECT * FROM filmshowings;');
    while ($row = $results->fetch()) {
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
        echo "<td>$row[certpic]</td>";
        echo "</tr>";
        if ($row[maxtickets] == 0) {
            echo "<tr><td>This screening is sold out, sorry!</td></tr>";
        } else {
            echo "<td><a href='book.php?filmID=$row[ID]&certID=$row[certificate]'>Book</a></td>";
            echo "</tr>";
            echo "</table>";
            
        }
    }
    echo "</div>";
    echo "<h1 class='filml'> Welcome $_SESSION[gatekeeper]! Check out our most recent additions. </h1>";
    echo "<footer>";
    if ($_SESSION[admin] == 1) {
        echo "<p><a href='addscreening.php'>Click here</a> to add a screening $_SESSION[gatekeeper] </p>";
    }
    echo "<p>Copyright© SolentCinemas 2016</p>";
    echo "</footer>";
    echo "</body>";
    echo "</html>";
    echo "</body>";
    echo "</html>";
}

?>