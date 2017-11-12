/* var randomNumber=5+6;
            console.log(randomNumber);*/
           var randomNumber=Math.floor(Math.random()*99)+1;
           var guesses=document.querySelector('#guesses');
           var lastResult=document.querySelector('#lastResult');
           var lowOrHi=document.querySelector('#lowOrHi');
           
           var guessSubmit=document.querySelector('.guessSubmit');
           var guessField=document.querySelector('.guessField');
           
           var guessCount=1;
           var resetButton=document.querySelector('#reset');
           var winCount=0;
           var looseCount=0;
           var wins=document.querySelector('#wins');
           var losses=document.querySelector('#losses');
           
           guessField.focus();
           //resetButton.style.display="none";
           $("#reset").hide();
           
            console.log(randomNumber);
            //document.getElementById("numbertoGuess").innerHTML=randomNumber;
            
            function checkGuess(){
                var userGuess=Number(guessField.value);
                if (guessCount===1){
                    guesses.innerHTML='Previous guesses: '
                }
                guesses.innerHTML+=userGuess+ ' ';
                
                    if(userGuess===randomNumber){
                        lastResult.innerHTML='Congradulations! You got it right!';
                        //lastResult.style.backgroundColor='green';
                        $("#lastResult").css("background-color", "green");
                        lowOrHi.innerHTML='';
                        winCount++;
                        
                        setGameOver();
                    }
                    //guess not in range
                    else if(userGuess>99){
                        lastResult.innerHTML='Your guess is larger than 99. Try a different guess ';
                       guessCount--;
                    }
                    else if(isNaN(userGuess)){
                        lastResult.innerHTML='Your guess is not a number. Try a different guess ';
                        guessCount--;
                    }
                    else if(guessCount===7){
                        //lastResult.innerHTML='Sorry, you lost!';
                        $("#lastResult").text("Sorry, you lost!");
                        looseCount++;
                        
                        setGameOver();
                    }
                    else{
                        lastResult.innerHTML="Wrong!";
                        //lastResult.style.backgroundColor='red';
                        $("#lastResult").css("background-color", "red");
                        if(userGuess<randomNumber){
                            lowOrHi.innerHTML='Last guess was too low!';
                        }
                        else if(userGuess>randomNumber){
                            lowOrHi.innerHTML='Last guess was too high!';
                        }
                    }
                    guessCount++;
                    guessField.value='';
                    guessField.focus();
                    losses.innerHTML='Losses: '+ looseCount;
                    wins.innerHTML='Wins: '+ winCount;
            }
            //error?
            guessSubmit.addEventListener('click', checkGuess);
           
           function setGameOver(){
               guessField.disabled=true;
               guessSubmit.disabled=true;
               resetButton.style.display='inline';
               resetButton.addEventListener('click', resetGame);
           } 
           
           function resetGame(){
               guessCount=1;
               var resetParas=document.querySelectorAll('.resultParas p');
               for(var i=0; i<resetParas.length; i++){
                   resetParas[i].textContent='';
               }
               
               //resetButton.style.display='none';
               $("#reset").hide();
               
               guessField.disabled=false;
               guessSubmit.disabled=false;
               guessField.value='';
               guessField.focus();
               
               lastResult.style.backgroundColor='white';
               
               randomNumber=Math.floor(Math.random()*99)+1;
           }