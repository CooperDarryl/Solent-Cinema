<?php
session_start();


if (!isset($_SESSION[gatekeeper])) {
    echo "<h1 class='filml'>You need to be logged in to see this page.  <a href='index.php'>Login</a><h1>";
}

else {
    
    
    $id    = $_GET['filmID'];
    $cert  = $_GET['certID'];
    $d     = $_SESSION['dob'];
    $m     = $_SESSION['mob'];
    $y     = $_SESSION['yob'];
    $today = getdate();
    $year  = $today['year'];
    $mon   = $today['mon'];
    $day   = $today['mday'];
    $uyear = ($year - $y);
    
    if ($uyear >= $cert) {
        if ($mon >= $m) {
            if ($day >= $d) {
            }
        }
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
        echo "<p class='logout'> You're logged in as $_SESSION[gatekeeper]. <a href='logout.php'> Logout</a></p><p><a href='mybookings.php'>My Bookings</a></p>";
        echo "</div>";
        echo "</header>";
        echo "<div class='listing'>";
        echo "</div>";
        $conn      = new PDO('mysql:host=localhost;dbname=dcooper', 'dcooper', 'ree0OoCh');
        $statement = $conn->prepare('SELECT * FROM filmshowings WHERE ID = ? AND certificate = ?;');
        $statement->bindParam(1, $id);
        $statement->bindParam(2, $cert);
        $statement->execute();
        while ($row = $statement->fetch()) {
            echo "<input type='hidden' value='$row[ID]'></input>";
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
            echo "<tr>";
            echo "<td><p>Available Tickets:</p>$row[maxtickets]</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td><br/><form  method='post' action='addbooking.php'><label for='max'>No of tickets</label><br/>
    <input type='hidden' value='$row[ID]' name='fID'><input type='hidden' value='$row[maxtickets]' name='maxtickets'></input><input type='number' value='$row[maxtickets]' name='rtickets' id='max' required/><input class='book' type='submit' name='book' value='Book!'/></form></td>";
            echo "</tr>";
            echo "</table>";
        }
        
        echo "<h1 class='filml'> $_SESSION[gatekeeper] select how many tickets you'd like and click book. </h1>";
        echo "<footer>";
        echo "<p>Copyright© SolentCinemas 2016</p>";
        echo "</footer>";
        echo "</body>";
        echo "</html>";
        echo "</body>";
        echo "</html>";
    }
    
    else {
        echo "<h1>You cant book this film as you dont meet the age requirement of $cert+. Go back <a href='home.php'>home</a> and pick something else.</h1>";
    }
}
?>
