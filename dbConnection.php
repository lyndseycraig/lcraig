<?php
function getDatabaseConnection(){
$host = 'localhost';
$dbname = 'quotes';
$username = 'root';
$password = '';
//creates database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//allows errors to be visible
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $dbConn;
}
?>