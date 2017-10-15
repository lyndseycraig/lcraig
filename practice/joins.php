<?php
$host = 'localhost';
$dbname = 'quotes';
$username = 'root';
$password = '';
//creates database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//allows errors to be visible
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function displayReflectionQuotes(){
    global $dbConn;
    
    
    $sql= "SELECT quote, firstName, lastName 
    FROM `q_quote` 
    NATURAL JOIN q_author 
    NATURAL JOIN q_category 
    NATURAL JOIN q_cat_quote 
    WHERE category='Reflection' ";
    
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute ();
    $records = $stmt->fetchAll();
    
    foreach(){
        echo $record['quote'] . "</em>" . $record
    }
    
    function displayMaleQuotes(){
        $sql=
        "SELECT quote, firstName, lastName, country 
        FROM `q_author` 
        NATURAL JOIN q_author 
        NATURAL JOIN q_category 
        NATURAL JOIN q_cat_quote 
        WHERE gender = m;
        LEFT JOIN q_quote 
        ON q_author.authorId = q_quote.authorId"; 
       
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute ();
        $records = $stmt->fetchAll();
    
    foreach(){
        echo $record['quote'] . "</em>" . $record
    }
    }
    
    function longest3Quotes{
          $sql=
        "SELECT LENGTH(quote), quoteId 
        FROM q_quote 
        ORDER BY LENGTH(quote) 
        DESC LIMIT 3"; 
       
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute ();
        $records = $stmt->fetchAll();
    
    foreach(){
        echo $record['quote'] . "</em>" . $record['author'] . "</em>" . $record['length(quote)'];
    }
        
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h2>Reflection Quotes</h2>
        
        <h2>Quotes by Male authors</h2>
        
        
    </body>
</html>