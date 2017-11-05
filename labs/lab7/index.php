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

if(empty($record)){//checks for wrong credentials
    
    if(isset($_POST['username'])){//checks for empty boxes
        echo "<p id='wrong'> Wrong credentials</p>";
    }
}
else{
    $_SESSION['username'] = $record['username'];
    $_SESSION['adminFullName']= $record['firstName']. " ". $record['lastName'];
   // $_SESSION['adminFullName']=$_record
    //echo "Successful login!";
    header('Location: admin.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 7: Admin Login</title>
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>@import url("css/styles.css");</style>
       
    </head>
    <body>
        
        <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <h1>Admin Login</h1>
        <form method="POST">
    
        Username: <input type="text" name="username"/> <br />
        Password: <input type="password" name="password"/> <br />
        <input type="submit" value="Login!" name="loginForm" />
         
        </form>
        </div>
        <div class="col-md-4"></div>
        </div> 


    </body>
</html>