<?php
session_start();

if(isset($_SESSION['random'])){
    $_SESSION['randomNumber']=rand(1,100);
}

$randomNumber=rand(1,100);


?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h1> Guess a number from 1 to 100</h1>
        
        <form>
            Guess: <input type="text" name="guess">
        </form>

    </body>
</html>