<?php

/*$deck=array();
for($i=1; $i<52; $i++){
    $deck[]=$i;
}
*/
$deck=range(1,41);
shuffle($deck);
//print_r($deck);
$totalPoints=0;

function displayHand(){
    global $deck, $totalPoints;
    $handPoints=0;
    $handAces=0;
    
    for($i=0; $i<5; $i++){
       
        $lastCard=array_pop($deck);
        $cardValue = $lastCard % 13;
        $cardSuit;
        if($lastCard<=13){
            $cardSuit="clubs";
        }
        else if($lastCard > 13 && $lastCard <=26){
            $cardSuit="diamonds";
        }
         else if($lastCard > 26 && $lastCard <=39){
            $cardSuit="hearts";
        }
         else if($lastCard > 39){
            $cardSuit="spades";
        }
        if($cardValue==0){
            $cardValue=13;
        }
        if($cardValue==1){//identifies an ace
            echo "<img class='ace' src='images/cards/$cardSuit/$cardValue.png' alt='Ace'/>";
            $handAces++; //adds 1 
        }
        else{
            echo "<img src='images/cards/$cardSuit/$cardValue.png' alt='Ace'/>";
        }
        //echo $lastCard % 13 . " ";
        $handPoints+=$cardValue;
         
    }//end forloop
    echo " <span>Points: " . $handPoints . "</span>";
    echo " <span>Aces: " . $handAces . "</span>";
    
    $totalPoints+=$handPoints;
    
    return $handAces;
    
}




/*function displayRandomCard(){
    $suits=array("clubs", "diamonds", "hearts", "spades"); 
    $randomCard = rand(1,13);
    $randomSuit=rand(0,3);
    echo "<img src='images/cards/$suits[$randomSuit]/$randomCard.png' alt='ace'/>";
}*/


//for($i=0; $i<5; $i++){
//    displayRandomCard();
//}

function identifyWinner(){
    global $player1Aces, $player2Aces;
     if($player1Aces > $player2Aces){
                echo "Player 1 ";
            }
            else if($player1Aces < $player2Aces){
                echo "Player 2 ";
            }
            else{
                echo "Nobody ";
            }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lab 3: Ace of Poker</title>
        <style>
            .ace{
                border:yellow 2px solid;
            }
            
            body{
                text-align:center;
                
            }
            span{
                font-size:25px;
                position:relative;
                top:-40px;
            }
        </style>
    </head>
    <body>
        <h1>Ace Poker</h1>
        <h2>Player with more aces wins all points.</h2>
        <span>Player 1: </span>
        <?php
            $player1Aces=displayHand();
        ?>
        <br>
        <span>Player 2: </span>
        <?php
            $player2Aces=displayHand();
        ?>
        <h2>
            <?=identifyWinner()?>
            Wins: <?=$totalPoints?> points!</h2>
    </body>
</html>