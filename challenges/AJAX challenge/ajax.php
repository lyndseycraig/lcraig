<?php
 session_start();
 include '../../dbConnection.php';
     $conn = getDatabaseConnection();
     
     function keywordSearch(){
         
    global $conn, $np;
      $sql = "SELECT * FROM pixabay WHERE word = :searchValue";
  

   $np = array();
     $np[":searchValue"]  = $searchValue; 

  
     $stmt = $conn->prepare($sql);
     $stmt->execute($np);
    
         $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  //retrieves all records;
      foreach ($records as $record){
          echo $record["word"] . " :" . $record["history"] . "<br>" ;
      }

}
keywordSearch();


$searchValue = $_GET['searchValue'];


   $sql = "INSERT INTO pixabay
            (word)
            VALUES 
            (:searchValue)";
     $np = array();
     $np[":searchValue"]  = $searchValue; 
   
 
    
     
     $stmt = $conn->prepare($sql);
     $stmt->execute($np);
    //   $record = $stmt -> fetch(PDO::FETCH_ASSOC);
     
         echo json_encode($record);




?>