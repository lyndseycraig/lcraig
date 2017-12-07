<?php
include '../dbConnection.php';
$conn=getDatabaseConnection();

function displayRating(){
    global $conn;
    $sql="SELECT DISTINCT rating 
    FROM r_shoes 
    ORDER by rating";
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
            echo "<option " ;
            
            if ($record['rating'] == $_GET['rating'] ) {
                echo "selected";
            }
            
            echo ">" . $record['rating'] . "</option>";
        }
}

function displayYear() {
       global $conn;
       $sql = "SELECT DISTINCT releaseYear 
                FROM r_shoes 
                ORDER BY releaseYear";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //print_r($records);
        
          foreach ($records as $record) {
            echo "<option " ;
            
            if ($record['releaseYear'] == $_GET['releaseYear'] ) {
                echo "selected";
            }
            
            echo ">" . $record['releaseYear'] . "</option>";
        }
        
   }
   
   function displayBrand(){
    global $conn;
    $sql="SELECT DISTINCT brandName 
    FROM r_shoes
    NATURAL JOIN r_brands 
    ORDER by brandName";
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
            echo "<option " ;
            
            if ($record['brandName'] == $_GET['brandName'] ) {
                echo "selected";
            }
            
            echo ">" . $record['brandName'] . "</option>";
        }
}










function displayShoes(){
    global $conn;
    $sql= "SELECT brandName, shoeName, price, rating, sizes, releaseYear 
    FROM r_shoes
    NATURAL JOIN r_brands
    WHERE 1";
    
   // echo $sql;
    
    $namedParameters = array();
    
 if (!empty($_GET['shoeName'])) { //user typed something for shoeName     
           
           //The following sql works BUT it allows SQL Injection!!
           //$sql = $sql . " AND quote LIKE '%".$_GET['content']."%'";
           
           //Preventing SQL injection
           $sql = $sql . " AND shoeName LIKE :shoeName"; //using named parameters to avoid SQL injection
           $namedParameters[":shoeName"] = "%" . $_GET['shoeName'] . "%";
           
          // echo $sql;
        }
        
        
        
        //
        if (isset($_GET['rating'])) { 
            
            if($_GET['rating'] == 'null'){
                
            } else {
            
            $sql = $sql . " AND rating = :rating ";
            $namedParameters[':rating'] = $_GET['rating'];
            
            //echo $sql . "<br />";
            }
        }
        
          if (isset($_GET['releaseYear'])) { 
            
            if($_GET['releaseYear'] == 'null'){
                
            } else {
            
            $sql = $sql . " AND releaseYear = :releaseYear ";
            $namedParameters[':releaseYear'] = $_GET['releaseYear'];
           // echo $sql . "<br />";
            }
        }
        
         if (isset($_GET['brandName'])) { 
            
            if($_GET['brandName'] == 'null'){
                
            } else {
            
            $sql = $sql . " AND brandName = :brandName ";
            $namedParameters[':brandName'] = $_GET['brandName'];
           // echo $sql . "<br />";
            }
        }
        
        //
        
        
        if (isset($_GET['price'])) {
        
            if ($_GET['price'] == 'asc') {
                
               $sql = $sql . " ORDER BY price ASC";
               
            } else {
                
                $sql = $sql . " ORDER BY price DESC";
            }
        
        }
                
        //echo $sql . "<br><br>";    
        
        
                
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
            echo "<div class='shoeBox'><span id='shoeOut'><em>" . $record['brandName'] . "</em> " . $record['shoeName'] . "</span> <br>Price: " . $record['price'] ." Rating: " . $record['rating'] . " Stars<br> Sizes: " . $record['sizes'] . " <br>Release Year: " . $record['releaseYear'] . "<br /></div>";
        }                
                
       
       
   }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Running Shoes Galore</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet"> 
        
        
        
    </head>
    <body>
        
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" id="middle">
        <a id="login" href="loginPage.php">Login</a>
        <h1 id="frontTitle" >Running Shoe Emporium</h1><br>
        <form id="front" method="get">
                 
                <input  id="shoename" placeholder="Search" type="text" name="shoeName" value="<?=$_GET['shoeName']?>">
                
                
                
                <select class="drop" name="brandName">
                    <option value="null">Select a Brand</option>
                    <?=displayBrand()?>
                </select><br>
                
                
                 
                <select class="drop" name="rating">
                    <option value="null">Select a Rating</option>
                    <?=displayRating()?>
                </select>
                
                
                
                <select class="drop" name="releaseYear">
                    <option value="null">Select a Year</option>
                    <?=displayYear()?>
                </select><br>
                
                
                
                Price:
                 <input type="radio" name="price" id="ascOrder" value="asc"
                 <?php
                  if ($_GET['price'] == 'asc') {
                     echo " checked";
                 }
                 
                 ?>
                 
                 >
                <label for="price">Ascending</label>
                 <input type="radio" name="price" id="descOrder" value="desc"
                 
                 <?php
                  if ($_GET['price'] == 'desc') {
                     echo " checked";
                 }
                 
                 ?>
                 
                 
                 >
                 
                <label for="descOrder">Decending</label><br>                
                <input type="submit" id="filter" value="Filter" name="submit"><br><br>
        </form>
        
        <div class="shoes">
            
            <?=displayShoes()?>
        </div>
        <div class="col-md-3"></div>
        </div>
        
    </div>
    </body>
</html>