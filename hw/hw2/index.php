        <?php
            
           $character= array("Barbie", "Clown", "Dora", "Pikachu","R2D2", "Spongebob", "Unicorn", "Zombie");
           $action= array("painting their nails", "pushing a shopping cart","driving an uber", "drinking a Red Bull", "waiting at the DMV", "eating a hamburger", "dancing in the club", "riding a bike");
            
            function randomChar(){
                global $character;
                shuffle($character);
                $finalChar=end($character);
                
                echo "<img src='images/$finalChar.png' alt='$finalChar' class='character'/>";
                echo '<span class="finalChar">'.$finalChar.'</span>';
                array_pop($character);
            }
            
            function randomAction(){
             global $action, $randImg;
              shuffle($action);
              
                $finalAct=end($action);
                if($finalAct=="painting their nails"){
                    $randImg="nails";
                }
                
                else if($finalAct=="pushing a shopping cart"){
                    $randImg="cart";
                }
                
                else if($finalAct=="driving an uber"){
                    $randImg="uber";
                }
                
                else if($finalAct=="drinking a Red Bull"){
                    $randImg="redbull";
                }
                
                else if($finalAct=="waiting at the DMV"){
                    $randImg="DMV";
                }
                
                else if($finalAct=="eating a hamburger"){
                    $randImg="burger";
                }
                
                else if($finalAct=="dancing in the club"){
                    $randImg="club";
                }
                
                else if($finalAct=="riding a bike"){
                    $randImg="bike";
                }
                
                
                
                
                
                
                
               echo '<span class="finalAct"> '.$finalAct.'</span>';
                echo "<img src='images/$randImg.png' alt='$randImg' class='action'/>";
                
                array_pop($action);
                
            }
            
        
            
            
           
            
            function play(){
                  
                for($i=0; $i<9; $i++){
                    if($i==8){
                        echo '<div id="points">'.rand(2,4).' times the points!<br>';
                    }
                else{
                    
                while($t==0){
                    $t=0;
                    echo '<div id="luck">Good luck</div><br>';
                    $t++;
                }
                
                randomChar();
                
                randomAction();
                
                
                echo "<br>";
                }
                }
            }
            
        ?>

<!DOCTYPE html>
<html>
    <head>
       <link href="https://fonts.googleapis.com/css?family=Hind|Sarpanch:400,800" rel="stylesheet"> 
        <style>@import url("css/style.css");</style>
        
        <title>Homework 2:Extreme Charades Generator</title>
    </head>
    <body>
        <h1>Extreme Charades</h1>
        <div id="main">
        <?php 
            play();
        ?>    
        </div>
    </body>
</html>