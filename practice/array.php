<?php

function displaySymbol($symbol){
    echo "<img src='../labs/lab2/img/$symbol.png' width='50'/>";
}
    $symbols= array("lemon", "orange", "cherry"); //initializes array
    //print_r($symbols); //displays all elements
    
    //echo $symbols[0];
    
    //displaySymbol($symbols[1]);
    
    $symbols[]="bar"; //adding new element at the end
    
    //displaySymbol($symbols[3]);
    
    array_push($symbols, "seven");
    //displaySymbol($symbols[4]);
    
   /* for($i=0; $i<5; $i++){
        displaySymbol($symbols[$i]);
        echo "<br/>";
    }
    */
    
    //$randomSymbol=rand(0,4);
    //$displaySymbol($symbols[rand(0,4)]);
    //displaySymbol($symbols[array_rand($symbols)]);
    print_r($symbols);
    
    $lastItem=array_pop($symbols); //retrieves and removes last item in the array
    
    displaySymbol($lastItem);
    echo "<hr> After sort:<br/>";
    print_r($symbols);
    
    sort($symbols);
    echo "<hr> After sort:<br/>";
    print_r($symbols);
    
    shuffle($symbols);
    echo "<hr> After sort:<br/>";
    print_r($symbols);
    
    foreach($symbols as $s){
        displaySymbol($s);
    }
?>