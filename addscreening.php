<?php
session_start();
if (!isset($_SESSION[gatekeeper])) {
    echo "You must be logged in and have admin rights to view this page!";
} elseif ($_SESSION[admin] == 1) {
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
    ;
    echo "<input name='search'>";
    echo "<input type='submit' name='submit' value='Search'/>";
    echo "</form>";
    echo "</fieldset>";
    echo "<p class='logout'> You're logged in as $_SESSION[gatekeeper]. <a href='logout.php'> Logout</a></p><p><a href='mybookings.php'>My Bookings</a></p>";
    echo "</div>";
    echo "</header>";
    echo "<h1 class='filml'> $_SESSION[gatekeeper], use the form below to add a new screening. </h1>";
    echo "<div class='addscreen'>";
    echo "<fieldset>";
    echo "<legend>Add Screening</legend>";
    echo "<form class='addscreen' action='submitscreening.php' method='post'>";
    echo "<label for='film'>Title</label><br/>";
    echo "<input name='film' id='film' value='Title' required/><br/>";
    echo "<label for='date'>Date</label><br/>";
    echo "<input name='date' id='date' type='date' value='Date' required/><br/>";
    echo "<label for='time'>Time</label><br/>";
    echo "<input name='time' id='time' type='time'value='Time' required/><br/>";
    echo "<label for='screen'>Screen</label><br/>";
    echo "<select name='screen' id='screen' >Screen<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select><br/>";
    echo "<label for='max'>Tickets</label><br/>";
    echo "<input type='number' value='100' name='maxtickets' id='max' required/><br/>";
    echo "<label for='cert'>Cert</label><br/>";
    echo "<select name='cert' id='cert' ><option value='0'>U</option><option value='12'>12</option><option value='15'>15</option><option value='18'>18</option></select><br/>";
    echo "<input class='sub' type='submit' name='submit' value='Add Screening'/>";
    echo "</form>";
    echo "</fieldset>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
    echo "<footer>";
    echo "<p>Copyright© SolentCinemas 2016</p>";
    echo "</footer>";
    echo "</body>";
    echo "</html>";
} else {
    echo "Only administrators can view this page. <a href='home.php'>Click here</a> to go back to home";
}
?>