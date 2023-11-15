var month 
var tries = 0;
var game1Mode = false;
var game2Mode = false;
var triesGame2 = 0;
var drawnNumber;
var game3Mode = false;
var drawnNumber2;
var tries3 = 0;
var game4Mode = false;
var number = 0;
var sum;


function randomMonth(){
  var months = ["Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień"];
  return months[Math.floor(Math.random() * months.length)];
}
function startGame1(){
  tries = 3;
  month = randomMonth();
  game1Mode = true;
  console.log(month);
}

function checkAnswer(){
  var answer = document.getElementById("month").value;;
  console.log(answer);
  if(!game1Mode){
    alert("Musisz zacząć grę!!!");
  }
  else{
    tries--;
    
    
      if(answer.toLowerCase() === month.toLowerCase())
    {
      document.getElementById("result").innerHTML = "Zgadłeś";
      game1Mode = false;
    }
    else if(tries == 0){
      document.getElementById("result").innerHTML = "Brak prób zacznij gre od początku, wylosowany miesiąc " + month ;
      game1Mode = false;
    }
    else{
      document.getElementById("result").innerHTML = "To nie ten  miesiąc, pozostałe próby " + (tries);
    }
    
    
  }

  }
  function randomNumber() {
    return Math.floor(Math.random() * 100) + 1;
}
  function startGame2(){
    triesGame2 = 3;
    game2Mode = true;
    drawnNumber = randomNumber();
    console.log(drawnNumber);
  }
  
  function checkNumber(){
    var answer = parseInt(document.getElementById("number").value);
    if(!game2Mode){
      alert("Musisz zacząć grę!!!");
    }
    else{
        if(isNaN(answer)){
          alert("To nie liczba");
        }
        else{
          triesGame2--;
          if(answer == drawnNumber){
            document.getElementById("result2").innerHTML = "Zgadłeś";
            game2Mode = false;
          }
          else if(triesGame2 == 0){
            document.getElementById("result2").innerHTML = "Brak prób zacznij gre od początku, wylosowana liczba " + drawnNumber ;
            game2Mode = false;
          }
          else if(answer < drawnNumber){
            document.getElementById("result2").innerHTML = "Wylosowana liczba jest większa, pozostałe próby "+(triesGame2);
          }
          else{
            document.getElementById("result2").innerHTML = "Wylosowana liczba jest mniejsza, pozostałe próby "+(triesGame2);
          }
          
        }
        
      
    }
  }
  function startGame3(){
    
    game3Mode = true;
    drawnNumber2 = randomNumber();
    console.log(drawnNumber);
    tries3 = 0;
  }
  function checkNumber2(){
    var answer2 = parseInt(document.getElementById("number2").value);
    if(!game3Mode){
      alert("Musisz zacząć grę 3!!!");
    }
    else{
      if(isNaN(answer2)){
        alert("To nie liczba");
      }
      else{
        tries3++;
        if(answer2 == drawnNumber2){
          document.getElementById("result3").innerHTML = "Zgadłeś, za próbą "+ tries3;
          game3Mode = false;
        }
        else if(answer2 < drawnNumber2){
          document.getElementById("result3").innerHTML = "Wylosowana liczba jest większa, numer próby "+ tries3;
        }
        else{
          document.getElementById("result3").innerHTML = "Wylosowana liczba jest mniejsza, numer próby "+ tries3;
        }
      }
    }
  }

  function startGame4(){
    
    var userNumber = parseInt(window.prompt("Podaj liczbę:"));
    if(isNaN(userNumber) | userNumber <= 0){
      alert("zły input");
    }
    else{
      number = userNumber;
      game4Mode = true;
      sum = 0;
    }
  }
  
  function game4(){
    if(!game4Mode){
      alert("zacznij grę 4!!!");
    }
    else{
      
      var answer4 = parseInt(document.getElementById("number4").value);
      if(isNaN(answer4)){
        alert("To nie liczba");
      }
      else{
        sum += answer4;
        number--;
        if(number == 0){
          document.getElementById("result4").innerHTML = "Finalna suma to  "+ sum;
          game4Mode = false;
        }
        else{
          document.getElementById("result4").innerHTML = "Suma = "+ sum;
        }
      }
      
    }
  }
  
