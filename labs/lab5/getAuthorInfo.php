<?php

include '../../dbConnection.php';
$conn= getDatabaseConnection();

$sql = "SELECT * FROM q_author WHERE authorId=" . $_GET['authorId'];
$stmt = $conn -> prepare ($sql);
$stmt -> execute();
$record = $stmt -> fetch(); //retrieves one record

echo "<h1>Author Info</h1>";
echo $record['firstName'] . " " . $record['biography'] . "</br></br>";
echo "Date of birth: " . $record['dob'] . "</br>";
echo "Date of death: " . $record['dod'] . "</br>";
echo "Profession: " . $record['profession'] . "</br>";
echo "Country: " . $record['country'] . "</br>";
echo "<div class='pics'><img src='" . $record['picture'] . "'></div>";
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Author Info </title>
        <style>@import url('css/styles.css');</style>
    </head>
    <body>
        

    </body>
</html>