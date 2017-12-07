<?php
session_start();

include '../dbConnection.php';
$conn = getDatabaseConnection();

//print_r($_SESSION);

if (!isset($_SESSION['username'])) { //if not set, it means that admin hasn't logged in
    
    header("Location: loginPage.php"); //redirects users to login page
    exit;
    
}

function shoeList(){
    global $conn;
    $sql = "SELECT *
            FROM r_shoes
            NATURAL JOIN r_brands
            ORDER BY brandName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}


function averageShoe(){
    global $conn;
    $sql = "SELECT AVG(price)
            AS avgPrice
            FROM r_shoes";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result=$records[0];
    
    echo $result['avgPrice'];
    
    //return $record;
    
    //echo $record;
    
    
}

function maxShoe(){
    global $conn;
    $sql = "SELECT MAX(price)
            AS maxPrice
            FROM r_shoes";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result=$records[0];
    
    echo $result['maxPrice'];
    
    //return $record;
    
    //echo $record;
    
    
}

function minShoe(){
    global $conn;
    $sql = "SELECT MIN(price)
            AS minPrice
            FROM r_shoes";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result=$records[0];
    
    echo $result['minPrice'];
    
    //return $record;
    
    //echo $record;
    
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section  </title>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet"> 
        
        <script>

            function confirmDelete() {
                
                return confirm("Are you sure you want to delete this shoe?");
                
            }            
            
         
        
        function avgPrice() {
            //alert($("#username").val());
            $.ajax({

                type: "GET",
                url: "avgPrice.php",
                dataType: "json",
                data: { "avgPrice":$("#avgPrice").val() },
                success: function(data, status) {
                    //alert(data);
                    $("#avgPrice").html("The average price is:"+data.avgPrice);
                    

                },
                complete: function(data, status) { //optional, used for debugging purposes
                    //alert(status);
                }

            }); //ajax
        }
       
        /*$(document).ready(function() {

            
            $("#avgPrice").change(function() { avgPrice() });
            
        });*/
            
        </script>
        
    </head>
    <body>
        <div class="row author"><div class="col-md-4"></div><div class="col-md-4">
        <h1> ADMIN SECTION</h1><br>
        <h2> Welcome <?=$_SESSION[adminFullName]?>!</h2>

<br>




        <?php 
        
        $shoes =shoeList();
        
        foreach($shoes as $shoe) {
            
            echo "[<a href='updateShoe.php?shoeId=".$shoe['shoeId']."'>Update</a>] ";
            //echo "[<a href='deleteShoe.php?shoeId=".$shoe['shoeId']."'>Delete</a>] ";
            
            echo "<form style='display:inline' action='deleteShoe.php' onsubmit='return confirmDelete()'>
                    <input type='hidden' name='shoeId' value='".$shoe['shoeId']."'>
                    <input type='submit' value='Delete'>
                  </form>";
            
            echo $shoe['brandName'] . " " . $shoe['shoeName'] . "<br>";
        }
        
        
        ?>
<br>     


<button id="priceButton" onclick="avgPrice()">Average Price</button><br>
<span id="avgPrice"></span>

<br>Maximum Shoe Price: <?=maxShoe()?><br>
Minimum Shoe Price: <?=minShoe()?><br>

<form action="addShoe.php" id="addShoe">
    <input type="submit" value="Add New Shoe" />
</form>

<form action="logout.php" id="logout">
    <input type="submit" value="Logout" />
</form>
</div><div class="col-md-4"></div>
    </body>
</html>