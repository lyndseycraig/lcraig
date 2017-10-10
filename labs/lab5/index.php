<?php

$host = 'localhost';
$dbname = 'quotes';
$username = 'root';
$password = '';
//creates database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//allows errors to be visible
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM q_author WHERE gender = 'M'";
function getAllQuotes(){
    
}
$stmt = $dbConn -> prepare ($sql);

$stmt -> execute ();

while ($row = $stmt -> fetch())  {
    echo  $row['firstName'] . " " . $row['lastName'] . "<br/>";
}

?>
}
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <h1>Male Authors</h1>
        <?=getAllQuotes?>
        
        <h1>All Quotes</h1>

    </body>
</html>