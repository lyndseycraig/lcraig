<?php
    $backgroundImage = "img/sea.jpg";

?>


<!DOCTYPE html>
<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
        @import url('css/styles.css');
        
        body{
            background-image: url('<?=$backgroundImage ?>');
        }
        </style>
    </head>
    <body>
        
        <?php
            if (isset($GET['keyword'])){
                include 'api/pixbayAPI.php';
                $imageURLs=getImageURLs($_GET['keyword']);
                
                for($i=0; $i<5; $i++){
                   $imageName=array_pop($imageURLs);
                   echo "<img src='$imageName' />";
                    
                }
            }
        
            if (!isset($imageURLs)) {
                echo "<h2>Type a keyword to display a slideshow <br/> with random images from Pixbay.com</h2>";
            }
            
            else{
                
                
            }
        
        ?>
        
        <form>
            <input type="text" name="keyword" placeholder="Keyword">
            <input type="submit" value="Submit" />
        </form>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
         
    </body>
</html>