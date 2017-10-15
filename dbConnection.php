<?php
function getDatabaseConnection(){
$host = 'us-cdbr-iron-east-05.cleardb.net';
$dbname = 'heroku_af87a74c6e99823';
$username = 'b2062ab40b269a';
$password = '96726403';
//creates database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//allows errors to be visible
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $dbConn;
}
?>