<?php
 include '../../dbConnection.php';
     $conn = getDatabaseConnection();
 session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> AJAX CHALLENGE</title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>

<form onSubmit="return false">
    Search Keywork: <input type="text" placeholder="search" id="searchBar" name="searchBar"/>
  <input  type="submit" onClick="searchImage();">
    
</form>
<br> Keyword search history: <span id="results"></span>
 <script type="text/javascript" src="js/functions.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>
</html>