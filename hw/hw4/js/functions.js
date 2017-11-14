var submitAnswers=document.querySelector('.submitAnswers');

var question1=document.querySelector('.question1');
var question2=document.querySelector('.question2');
var question3=document.querySelector('.question3');
var question4=document.querySelector('.question4');
var question5=document.querySelector('.question5');
var question6=document.querySelector('.question6');

function check123()/*checked with JavaScript*/{
    if(question1.value=='true'){
         //question1.innerHTML='Congradulations! You got it right!';
         document.getElementById("#question1").innerHTML = "Congradulations! You got it right!"; 
    }
    else{
        question1.innerHTML='Sorry, the answer was incorrect. The correct answer is True';
    }
    
    if(question2.value=='nutrients'){
        //question2.innerHTML='You have chosen the correct answer';
        document.getElementById("#question2").innerHTML = "Congradulations! You got it right!"; 
    }
    
    else{
        question2.innerHTML='Sorry, that answer was incorrect. The correct answer is nutrients.';
    }
    
    if(question3.value=='guacamole'){
        question3.innerHTML='You have chosen the correct answer';
    }
    
    else{
        question3.innerHTML='Sorry, that answer was incorrect. The correct answer is guacamole.';
    }
    
    
}

/*function check456()/*checked with jQuery{
    
}*/



submitAnswers.addEventListener('click', check123);
//submitAnswers.addEventListener('click', check456);