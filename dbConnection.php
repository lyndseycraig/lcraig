<?php

function getDatabaseConnection($dbname = 'quotes'){
$host = 'localhost'; //cloud 9 database
//$dbname = 'quotes';
$username = 'root';
$password = '';
//creates database connection


//when connecting to heroku
    //when connecting from Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = 'us-cdbr-iron-east-05.cleardb.net';
        $dbname = 'heroku_af87a74c6e99823';
        $username = 'b2062ab40b269a';
        $password = '96726403';
    } 

$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//we'll be able to see some errors with database
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $dbConn;

}
?>