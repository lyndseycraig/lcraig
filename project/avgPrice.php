<?php

include '../dbConnection.php';

$conn = getDatabaseConnection();

    /*$sql = "SELECT username 
            FROM q_login
            WHERE username = :username";
            
    $stmt = $conn -> prepare ($sql);
    $stmt -> execute( array(":username"=>$_GET['username']) );
    $record = $stmt -> fetch(PDO::FETCH_ASSOC);
    
    //print_r($record);
    
    */
    
     $sql = "SELECT AVG(price)
            AS avgPrice
            FROM r_shoes";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result=$records[0];
    
    //echo $result['avgPrice'];
    
    echo json_encode($result);
    
    


?>
