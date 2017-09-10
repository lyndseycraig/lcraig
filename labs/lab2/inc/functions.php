<?php
    function displaySymbol($randomValue, $pos){
        
        if ($randomValue== 0) {
            $symbol="seven";
        }
        
        else if ($randomValue== 1){
            $symbol="cherry";
        }
        
        else if ($randomValue== 2){
            $symbol="lemon";
        }
        
        else{
            $symbol="grapes";
        }
        echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='$symbol' width='70'>";
        }
        
        //Displays number of points player has won
        function displayPoints($randomValue1,$randomValue2,$randomValue3){
            
            //checking if the symbols are the same
            if($randomValue1==$randomValue2){
                if($randomValue2==$randomValue3){
                    switch($randomValue1){
                        case 0:$totalPoints=1000;
                            echo " <audio autoplay>
                                        <source src='sounds/jackpot.mp3' type='audio/ogg'>
                                    </audio> ";
                            break;
                        case 1:$totalPoints=500;
                            break;
                        case 2:$totalPoints=250;
                            break;
                        case 3:$totalPoints=900;
                            break;
                    }
                    
                    echo "<h2>You won $totalPoints points!</h2>";
                }
                else{
                    echo "<h3>Sorry, try again.</h3>";
                }
                
            }
            else{
                echo "<h3>Sorry, try again.</h3>";
            }
    
            
        }
        
        function play(){
        for($i=1; $i<4; $i++){
            ${"randomValue" . $i} = rand(0,3);
            displaySymbol(${"randomValue" . $i}, $i);
        }
        
       
        
        displayPoints($randomValue1,$randomValue2,$randomValue3);
        
    }

?>