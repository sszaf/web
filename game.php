<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Szymon Szafraniec, Leszek Kryzar">
  <meta name="keywords" content="Różne gry zgadywanki">
  <!-- <link rel="stylesheet" href="design.css"> -->
  <script src="scriptsLeh.js" defer></script>
  <title>Game</title>
</head>
<body class="game">
<?php
include 'preferences.php';

// Odczytanie preferencji użytkownika z ciastka
$preferences = getPreferencesFromCookie();
?>
 <style>
        body {
            font-family: <?php echo $preferences['font']; ?>;
            color: <?php echo $preferences['font_color']; ?>;
            background-color: <?php echo $preferences['bg_color']; ?>;
        }
    </style>

  <h1>Gra pierwsza</h1>
  <button id="startGame1" class="buttonGame" onclick="startGame1()">Zacznij grę</button>
  <p>Komuter losuje miesiąc a ty masz 3 próby by zgadnąć</p>
  <label for="miesiace">Wybierz miesiąc:</label>
<select id="month">
    <option value="styczeń">Styczeń</option>
    <option value="luty">Luty</option>
    <option value="marzec">Marzec</option>
    <option value="kwiecień">Kwiecień</option>
    <option value="maj">Maj</option>
    <option value="czerwiec">Czerwiec</option>
    <option value="lipiec">Lipiec</option>
    <option value="sierpień">Sierpień</option>
    <option value="wrzesień">Wrzesień</option>
    <option value="październik">Październik</option>
    <option value="listopad">Listopad</option>
    <option value="grudzień">Grudzień</option>
</select>
  <button  onclick="checkAnswer()" class="buttonCheck">Sprawdź odpowiedź</button>
  <p id="result"></p>
  <h1>Gra druga</h1>
  <button id="startGame2" class="buttonGame" onclick="startGame2()">Zacznij grę 2</button>
  <p>komputer losuje liczbę całkowitą z zakresu 1-100, natomiast ty ma 3 szanse do odgadnięcia</p>
  <input type="text" id="number" placeholder="podaj liczbę">
  <button onclick="checkNumber()" class="buttonCheck">Sprawdź odpowiedź</button>
  <p id="result2"></p>
  <h1>Gra trzecia</h1>
  <button id="startGame3" class="buttonGame" onclick="startGame3()">Zacznij grę 3</button>
  <p>komputer losuje liczbę całkowitą z zakresu 1-100, natomiast ty musisz ją zgadnąć</p>
  <input type="text" id="number2" placeholder="podaj liczbę">
  <button onclick="checkNumber2()" class="buttonCheck">Sprawdź odpowiedź</button>
  <p id="result3"></p>
  <h1>Gra czwarta</h1>
  <button id="startGame4" class="buttonGame" onclick="startGame4()">Zacznij grę 4</button>
  <p>Dodawanie podanych liczb</p>
  <input type="text" id="number4" placeholder="podaj liczbę">
  <button onclick="game4()" class="buttonCheck">Dodaj Liczbę</button>
  <p id="result4"></p>


</body>
</html>