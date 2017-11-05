<?php

session_start();

if (!isset($_SESSION['username'])) { //checks whether admin has already logged in
    
    header("Location: index.php");
    exit;
    
}

include '../../dbConnection.php';
$conn = getDatabaseConnection();

function getAuthorInfo() {
    global $conn;
        
    $sql = "SELECT *
            FROM q_author
            WHERE authorId = " . $_GET['authorId'];    
     
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);  
    return $record;
}

if (isset($_GET['updateForm'])) { //Admin submitted update form
    
    //echo "Update form was submitted!";
    
    $sql = "UPDATE q_author SET 
	            firstName = :fName,
	            lastName = :lName,
	            gender = :gender
            WHERE authorId = :authorId";
    
    $namedParameters = array();
    $namedParameters[':fName'] = $_GET['firstName'];
    $namedParameters[':lName'] = $_GET['lastName'];
    $namedParameters[':gender'] = $_GET['gender'];
    $namedParameters[':authorId'] = $_GET['authorId'];
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    echo "Record was updated!";

    
}


if (isset($_GET['authorId'])) {
    
    $authorInfo = getAuthorInfo();  
    
    //print_r($authorInfo);
    
}




?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update Author's Info </title>
        
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
         <link rel="stylesheet" type="text/css" href="css/styles.css" />
    </head>
    <body>
        <legend> Updating Author's Info</legend>
        <div class="row">
            <div class="col-md-4"></div><div class="col-md-4">
      <form id="update">
                
                
                 <input type="hidden" name="authorId" value="<?=$authorInfo['authorId']?>">
                 
                First Name: <input type="text" name="firstName" value="<?=$authorInfo['firstName']?>" /> <br />
                Last Name: <input type="text" name="lastName" value="<?=$authorInfo['lastName']?>"/> <br />
                Gender: <input type="radio" name="gender" value="F"
                            id="genderF"  
                            
                            <?php
                            
                                if ($authorInfo['gender']=="F") {
                                    echo "checked";
                                }
                            
                            ?>
                            
                            />
                            <label for="genderF"></label>Female
                         <input type="radio" name="gender" value="M"
                         
                            <?= ($authorInfo['gender']=="M")?"checked":"" ?>
                         
                            id="genderM"   /><label for="genderF"></label>Male <br />   
                Birth Date: <input type="date" name="dob" value="<?=$authorInfo['dob']?>"/><br /> 
                Death Date: <input type="date" name="dod" value="<?=$authorInfo['dod']?>"/><br /> 
                Profession: <input type="text" name="profession" value="<?=$authorInfo['profession']?>"/><br /> 
                Country: <select name="country">
                            <option>USA</option>
                            <option>Germany</option>
                            <option>China</option>
                            <option>India</option>
                        </select><br /> 
                Picture URL: <input type="text" name="picture"  value="<?=$authorInfo['picture']?>" />   <br>
                Biography: <br /> <textarea name="biography" cols="55" rows="5"><?=$authorInfo['biography']?></textarea><br>
                <input type="submit" value="Update Author" name="updateForm">
                <a class="back" href="admin.php">Go Back</a>
            </form>
            
        </div>
        <div class="col-md-4"></div>
        </div>
    </body>
</html>