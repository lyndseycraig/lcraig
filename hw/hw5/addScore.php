<?php

 
 if (isset($_GET['addForm'])) { //checks if form was submitted
     
     include '../../dbConnection.php';
     $conn = getDatabaseConnection();
     
     //echo "Form was submitted!";
     $sql = "INSERT INTO a_scores
            (userId,score)
            VALUES 
            (:fName, :lName, )";
     $np = array();
     
     $np[":fName"]  = $_GET['firstName'];
     $np[":score"]  = $_GET['score'];
     
     
     $stmt = $conn->prepare($sql);
     $stmt->execute($np);
     
     echo "Score recorded!";
     
 }

header('Location: quiz.php');
?>

