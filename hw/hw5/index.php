<?php
session_start();

include '../../dbConnection.php';
$conn= getDatabaseConnection();

$username=$_POST['username'];
$password=$_POST['password'];

$sql = "SELECT *
FROM a_quiz
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
    $_SESSION['userId'] = $record['userId'];
    
       
   // $_SESSION['adminFullName']=$_record
    //echo "Successful login!";
    header('Location: quiz.html');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Homework 5: AJAX</title>
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
         <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Oleo+Script|Roboto" rel="stylesheet">  
       
       
    </head>
    <body>
        
        <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-2">
        <div id="signin">
        <br><br>
        <h1>Admin Login</h1>
        <form method="POST">
        
        Username: <br><input type="text" name="username"/> <br />
        Password: <br><input type="password" name="password"/> <br /><br>
        <input type="submit" value="Login!" name="loginForm" />
        <br>
        Username1: user1<br>
        Password1: secret1<br><br>
        
        Username2: user2<br>
        Password2: secret2<br><br>
        </div> 
        </form>
        
        </div>
        <div class="col-md-5"></div>
        </div> 


    </body>
</html>