<?php
session_start();

if (!isset($_SESSION['username'])) { //checks whether admin has already logged in
    
    header("Location: loginPage.php");
    exit;
    
}

include '../dbConnection.php';
$conn = getDatabaseConnection();

$sql = "DELETE FROM r_shoes WHERE shoeId = " . $_GET['shoeId'];

//echo $sql;

$stmt = $conn->prepare($sql);
$stmt->execute();

header('Location: admin.php');

?>