<?php

include '../../dbConnection.php';
$dbConn= getDatabaseConnection();

/*function getAllQuotes(){
    
$stmt = $dbConn -> prepare ($sql);

$stmt -> execute ();
}*/

function getRandomQuote(){
    global $dbConn;
    
  //Step 1: Generating Random Quote Id
    
    $sql= "SELECT quoteId FROM q_quote";
    
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute();
    $records = $stmt-> fetchAll(); //retrieves all records
    
    $randomIndex = array_rand($records);
    
    //echo($records[$randomIndex['quoteId']]);
   
    $quoteId= $records[$randomIndex]['quoteId'];//creates random Id number
    
    //Step 2: Retrieving quote based on Random Quote Id
    $sql = "SELECT quote, firstName, lastName, authorId
    FROM q_quote
    NATURAL JOIN q_author
    WHERE quoteId = $quoteId";
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute();
    $record = $stmt-> fetch(); //using fetch because expected to get only ONE record
    
    echo "<em>" . $record['quote']."</em></br>";
    echo "<a target='authorInfo' href='getAuthorInfo.php?authorId=".$record['authorId']."'>-" . $record['firstName'] ." ". $record['lastName'] . "</a>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <h1>All Quotes</h1>
        
        <?=getRandomQuote()?>
        
        <br/>
        
        <iframe name="authorInfo" width="500" height="300"></iframe>

    </body>
</html>