<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: index.php");
    exit;
}

include '../../dbConnection.php';
$conn= getDatabaseConnection();

function authorList(){
    global $conn;
    $sql= "SELECT *
    FROM q_author
    ORDER BY lastName";
    
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Section </title>
    </head>
    <body>
        <h1>ADMIN SECTION</h1>
        <h2>Welcome <?=$_SESSION[adminFullName]?>!</h2>
        <br>
        
        <form action="addAuthor.php">
            <input type="submit" value="Add new author" />
        </form>
        <?php
        $authors=authorList();
        
        foreach($authors as $author){
            echo $author['firstName'] . " " . $author['lastName'] . " " . $author['country'] . "<br>";
        }
        
        ?>

    </body>
</html>