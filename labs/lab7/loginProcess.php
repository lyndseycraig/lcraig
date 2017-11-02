<?php
session_start();

include '../../dbConnection.php';
$conn= getDatabaseConnection();

$username=$_POST['username'];
$password=sha1($_POST['password']);

//This code is bad because it allows SQL injection
/*$sql = "SELECT *
FROM q_admin
WHERE username='$username'
AND password= '$password'";*/

$sql = "SELECT *
FROM q_admin
WHERE username= :username
AND password= :password";

$namedParameters = array();
$namedParameters[':username']= $username;
$namedParameters[':password']= $password;

$stmt=$conn->prepare($sql);
$stmt->execute($namedParameters);
$record=$stmt->fetch(PDO::FETCH_ASSOC);

if(empty($record)){
    echo "Wrong credentials!";
}
else{
    $_SESSION['username'] = $record['username'];
    $_SESSION['adminFullName']= $record['firstName']. " ". $record['lastName'];
   // $_SESSION['adminFullName']=$_record
    //echo "Successful login!";
    header('Location: admin.php');
}
?>