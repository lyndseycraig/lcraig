<?php
$alphabet = range("A","Z"); 
//print_r($alphabet);
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <h2>Find the Letter</h2>
       <form>
           <h2>Select a table size:</h2>
           <select name="Table">
            <option value="table6">6x6</option>
            <option value="table7">7x7</option>
            <option value="table8">8x8</option>
            <option value="table9">9x9</option>
            <option value="table10">10x10</option>
        </select>
        <h2>Letter to find:</h2>
        <select name="Find">
            <?php 
            global $alphabet;
            
               for($i=0; $i<(count($alphabet));$i++){
                 echo "<option value=" . $alphabet[$i]. ">". $alphabet[$i] . "</option>";
               }
            ?>
        </select>
        <h2>Letter to omit:</h2>
        <select name="Omit">
            <?php 
            global $alphabet;
               for($i=0; $i<(count($alphabet));$i++){
                 echo "<option value=" . $alphabet[$i]. ">". $alphabet[$i] . "</option>";
               }
            ?>
        </select>
         <input type="submit" value="Submit">
        </form> 
        <?php
            if (isset($_GET['submit'])){
                
            }
        
        ?>
    </body>
</html>