<?php

session_start();

if (!isset($_SESSION['username'])) { //checks whether admin has already logged in
    
    header("Location: loginPage.php");
    exit;
    
}

include '../dbConnection.php';
$conn = getDatabaseConnection();

function getShoeInfo() {
    global $conn;
        
    $sql = "SELECT *
            FROM r_shoes
            WHERE shoeId = " . $_GET['shoeId'];    
     
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);  
    return $record;
}

if (isset($_GET['updateForm'])) { //Admin submitted update form
    
    //echo "Update form was submitted!";
    
    $sql = "UPDATE r_shoes SET
	            shoeName = :shoeName,
	            price = :price,
	            rating = :rating,
	            sizes = :sizes,
	            releaseYear = :releaseYear,
	            brandId = :brandId
            WHERE shoeId = :shoeId";
    
    $namedParameters = array();
    $namedParameters[':shoeName'] = $_GET['shoeName'];
    $namedParameters[':price'] = $_GET['price'];
    $namedParameters[':rating'] = $_GET['rating'];
    $namedParameters[':sizes'] = $_GET['sizes'];
    $namedParameters[':releaseYear'] = $_GET['releaseYear'];
    $namedParameters[':brandId'] = $_GET['brandId'];
    $namedParameters[':shoeId'] = $_GET['shoeId'];
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    echo "Record was updated!";

    
}


if (isset($_GET['shoeId'])) {
    
    $shoeInfo = getShoeInfo();  
    
    
}




?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update Shoe's Info </title>
        
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
         <link rel="stylesheet" type="text/css" href="css/styles.css" />
         <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
    </head>
    <body>
        <legend>Updating Shoe's Info</legend>
        <div class="row">
            <div class="col-md-4"></div><div class="col-md-4">
      <form id="update">
                
                
                 <input type="hidden" name="shoeId" value="<?=$shoeInfo['shoeId']?>">
                
                Brand: <select name="brandId">
                            <option value="1">Nike</option>
                            <option value="2">Brooks</option>
                            <option value="3">Adidas</option>
                            <option value="4">Hoka</option>
                            <option value="5">Asics</option>
                            <option value="6">Saucony</option>
                        </select><br />  
                Shoe Name: <input type="text" name="shoeName" value="<?=$shoeInfo['shoeName']?>" /> <br />
                Price: <input type="text" name="price" value="<?=$shoeInfo['price']?>" /> <br />
                Rating: <select name="rating">
                            <option>5</option>
                            <option>4</option>
                            <option>3</option>
                            <option>2</option>
                            <option>1</option>
                        </select><br /> 
                Sizes: <input type="textarea" name="sizes" value="<?=$shoeInfo['sizes']?>" /> <br />
                Year Released: <input type="text" name="releaseYear" value="<?=$shoeInfo['releaseYear']?>"/><br /> 
                
                <input type="submit" value="Update Shoe" name="updateForm">
                <a class="back" href="admin.php">Go Back</a>
            </form>
            
        </div>
        <div class="col-md-4"></div>
        </div>
    </body>
</html>