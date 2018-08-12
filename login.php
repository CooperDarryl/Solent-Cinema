<?php

session_start();


$un = $_POST['user'];
$pw = $_POST['pass'];

//Connect to Database
$conn      = new PDO('mysql:host=localhost;dbname=dcooper', 'dcooper', 'ree0OoCh');
$statement = $conn->prepare('SELECT * FROM sc_users WHERE username =? AND password =?;');
$statement->bindParam(1, $un);
$statement->bindParam(2, $pw);
$statement->execute();

if ($row = $statement->fetch()) {
    $_SESSION['gatekeeper'] = $un;
    $_SESSION['admin']      = $row[isadmin];
    $_SESSION['dob']        = $row[dayofbirth];
    $_SESSION['mob']        = $row[monthofbirth];
    $_SESSION['yob']        = $row[yearofbirth];
    
    header('location: home.php');
    
} else {
    echo "Inavlid Login, to try again please <a href='index.php'> click here </a>";
}

?>