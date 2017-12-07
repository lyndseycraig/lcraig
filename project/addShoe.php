<?php

 
 if (isset($_GET['addForm'])) { //checks if form was submitted
     
     include '../dbConnection.php';
     $conn = getDatabaseConnection();
     
     //echo "Form was submitted!";
     $sql = "INSERT INTO r_shoes    
            (shoeName, price, rating, sizes, releaseYear, brandId)
            VALUES 
            (:shoeName, :price, :rating, :sizes, :releaseYear, :brandId)";
     $np = array();
     $np[":shoeName"]  = $_GET['shoeName'];
     $np[":price"]  = $_GET['price'];
     $np[":rating"]  = $_GET['rating'];
     $np[":sizes"]  = $_GET['sizes'];
     $np[":releaseYear"]  = $_GET['releaseYear'];
     $np[":brandId"]  = $_GET['brandId'];
     
     
     $stmt = $conn->prepare($sql);
     $stmt->execute($np);
     
     echo "Shoe added!";
     
 }


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Adding New Shoe</title>
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
    </head>
    <body>
         <div class="row">
        <div class="col-md-4"></div><div class="col-md-4">
        <h1> Add New Shoe </h1>
        
        <fieldset>
            
            <legend> Adding New Shoe </legend>
            
            <form id="add">
                
                Brand: <select name="brandId">
                            <option value="1">Nike</option>
                            <option value="2">Brooks</option>
                            <option value="3">Adidas</option>
                            <option value="4">Hoka</option>
                            <option value="5">Asics</option>
                            <option value="6">Saucony</option>
                        </select><br />  
                Shoe Name: <input type="text" name="shoeName" /> <br />
                Price: <input type="text" name="price" /> <br />
                Rating: <select name="rating">
                            <option>5</option>
                            <option>4</option>
                            <option>3</option>
                            <option>2</option>
                            <option>1</option>
                        </select><br /> 
                Sizes: <input type="textarea" name="sizes" /> <br />
                Year Released: <input type="text" name="releaseYear" /><br /> 
                
                <input type="submit" value="Add Shoe" name="addForm">
                <a class="back" href="admin.php">Go Back</a>
            </form>
            
            
        </fieldset>
        </div>
        <div class="col-md-4"></div>
        </div>
    </body>
</html>