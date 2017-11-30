<?php

include '../../dbConnection.php';

$conn = getDatabaseConnection();

    $sql = "SELECT score 
            FROM a_scores
            WHERE score = :score";
            
    $stmt = $conn -> prepare ($sql);
    $stmt -> execute( array(":score"=>$_GET['score']) );
    $record = $stmt -> fetch(PDO::FETCH_ASSOC);
    
    //print_r($record);
    
    echo json_encode($record);


?>
