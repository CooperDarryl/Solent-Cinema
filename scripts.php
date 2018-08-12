
<?php
//List all new films
$conn   = new PDO("mysql:host=localhost;dbname=dcooper;", "dcooper", "ree0OoCh");
$lfilms = $conn->query("SELECT * FROM filmshowings WHERE new = 1");
print_r($conn->errorinfo);
while ($row = $lfilms->fetch()) {
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
    echo "</table>";
}
?>