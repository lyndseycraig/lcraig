<?php
include '../../dbConnection.php';
$conn=getDatabaseConnection();

function displayCountryOptions(){
    global $conn;
    $sql="SELECT DISTINCT(country) 
    FROM q_author 
    ORDER by country";
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
            echo "<option " ;
            
            if ($record['country'] == $_GET['country'] ) {
                echo "selected";
            }
            
            echo ">" . $record['country'] . "</option>";
        }
}

function displayCategoryOptions() {
       global $conn;
       $sql = "SELECT * 
                FROM `q_category` 
                ORDER BY category";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //print_r($records);
        
          foreach ($records as $record) {
            echo "<option " ;
            
            if ($record['category'] == $_GET['category'] ) {
                echo "selected";
            }
            
            echo ">" . $record['category'] . "</option>";
        }
        
   }

function displayQuotes(){
    global $conn;
    $sql= "SELECT firstName, lastName, quote
    FROM q_author
    NATURAL JOIN q_quote
    NATURAL JOIN q_cat_quote
    NATURAL JOIN q_category
    WHERE 1";
    
   // echo $sql;
    
    $namedParameters = array();
    
 if (!empty($_GET['content'])) { //user typed something for quote content      
           
           //The following sql works BUT it allows SQL Injection!!
           //$sql = $sql . " AND quote LIKE '%".$_GET['content']."%'";
           
           //Preventing SQL injection
           $sql = $sql . " AND quote LIKE :quoteContent"; //using named parameters to avoid SQL injection
           $namedParameters[":quoteContent"] = "%" . $_GET['content'] . "%";
           
          // echo $sql;
        }
        
        
        if (isset($_GET['gender'])) { //gender was checked by the user
            
            $sql = $sql . " AND gender = :gender ";
            $namedParameters[':gender'] = $_GET['gender'];
            
           // echo $sql;
        }
        
        //
        if (isset($_GET['country'])) { //country checked
            
            if($_GET['country'] == 'null'){
                
            } else {
            
            $sql = $sql . " AND country = :country ";
            $namedParameters[':country'] = $_GET['country'];
            
            //echo $sql . "<br />";
            }
        }
        
          if (isset($_GET['category'])) { //category checkedcategory
            
            if($_GET['category'] == 'null'){
                
            } else {
            
            $sql = $sql . " AND category = :category ";
            $namedParameters[':category'] = $_GET['category'];
           // echo $sql . "<br />";
            }
        }
        
        //
        
        
        if (isset($_GET['orderBy'])) {
        
            if ($_GET['orderBy'] == 'orderByAuthor') {
                
               $sql = $sql . " ORDER BY lastName";
               
            } else {
                
                $sql = $sql . " ORDER BY quote";
            }
        
        }
                
        //echo $sql . "<br><br>";    
        
        
                
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
            echo "<em>" . $record['quote'] . "</em> " . $record['firstName'] . " " . $record['lastName'] . "<br />";
        }                
                
       
       
   }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6: Quote Finder</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link href="https://fonts.googleapis.com/css?family=Fugaz+One|Lobster" rel="stylesheet"> 
    </head>
    <body>
        <div class="whole">
        <h1>Quote Finder</h1>
        <form method="get">
                <strong>Quote Content:</strong>
                <input type="text" name="content" value="<?=$_GET['content']?>">
                <br>
                <strong>Author's Gender:</strong>
                <input type="radio" name="gender" id="female" value="F"
                
                <?php 
                
                 if ($_GET['gender'] == 'F') {
                     echo " checked";
                 }
                 
                 ?>
                
                >
                <label for="female">Female</label>
                <input type="radio" name="gender" id="male" value="M"
                
                <?php 
                
                 if ($_GET['gender'] == 'M') {
                     echo " checked";
                 }
                 
                 ?>
                
                >
                <label for="male">Male</label><br>
                <strong>Author's Birthplace:</strong>
                <select name="country">
                    <option value="null">Select a Country</option>
                    <?=displayCountryOptions()?>
                </select><br>
                <strong>Category:</strong>  
                <select name="category">
                    <option value="null">Select a Category</option>
                    <?=displayCategoryOptions()?>
                </select>
                <br>
                <strong>Order by: </strong>
                 <input type="radio" name="orderBy" id="orderByAuthor" value="orderByAuthor"
                 <?php
                  if ($_GET['orderBy'] == 'orderByAuthor') {
                     echo " checked";
                 }
                 
                 ?>
                 
                 >
                <label for="orderByAuthor">Author</label>
                 <input type="radio" name="orderBy" id="orderByQuote" value="orderByQuote"
                 
                 <?php
                  if ($_GET['orderBy'] == 'orderByQuote') {
                     echo " checked";
                 }
                 
                 ?>
                 
                 
                 >
                 
                <label for="orderByQuote">Quote</label><br>                
                <input type="submit" value="Filter" name="submit"><br><br>
        </form>

     

        <div class="quotes">
            
            <?=displayQuotes()?>
            
        </div>
      </div>  
    </body>
</html>