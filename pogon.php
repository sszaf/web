<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Szczecin, piłka nozna, atrakcje, czas wolny">
  <meta name="author" content="Szymon Szafraniec, Leszek Kryzar">
  <script src="pogon.js" defer></script>
  <script src="strict.js" defer></script>
  <link rel="stylesheet" href="design.css">
  <title>Pogoń</title>
</head>
<body>
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

  <h1>Pogoń Szczecin Duma Pomorza</h1>
  <img  id="photo" src="https://ocdn.eu/sport-images-transforms/1/Tnxk9lGaHR0cHM6Ly9vY2RuLmV1L3B1bHNjbXMvTURBXy80OTcxMDIxOC0xZjg2LTRlYjMtOTk3MS1iZjkzOTIzZTRjNDQuanBlZ5OVAwDMnM0TiM0K_JUCzQSwAMLDkwmmNzVhYWFhBt4AAqEwAaExAQ/pogon-szczecin.jpeg" alt="Drużyna Pogoni" width ="1200" height="640">
  <a href="#section1">Przejdź do sekcji terminarzy</a>
  <h3 id="zespol">Poznaj Naszych Zawodników</h3>
  <table class="players">
    <tr>
      <th>Pozycja</th>
      <th>Imię i Nazwisko</th>
    </tr>
    <tr>
      <td rowspan="2" style="background-color: blue;">Bramkarz</td>
      <td style="font-style: italic;">Valentin Cojocaru</td>
    </tr>
    <tr>
      <td style="font-weight: bolder;">Bartosz Klebaniuk</td>
    </tr>
    <tr>
      <td rowspan="5" style="background-color: yellow;">Obrońca</td>
      <td>Danijel Loncar</td>
    </tr>
    <tr>
      <td>Mariusz Malec</td>
    </tr>
    <tr>
      <td>Benedikt Zech</td>
    </tr>
    <tr>
      <td>Wojciech Lisowski</td>
    </tr>
    <tr>
      <td>Leonardo Koutris</td>
    </tr>
    <tr>
      <td rowspan="5" style="background-color: green;">Pomocnik</td>
      <td>Fredrik Ulvestad</td>
    </tr>
    <tr>
      <td>João Gamboa</td>
    </tr>
    <tr>
      <td>Luka Zahovic</td>
    </tr>
    <tr>
      <td>Rafal Kurzawa</td>
    </tr>
    <tr>
      <td>Kacper Smolinski</td>
    </tr>
    <tr>
      <td rowspan="3" style="background-color: red;">Napastnik</td>
      <td>Kamil Grosicki</td>
    </tr>
    <tr>
      <td>Vahan Bichakhchyan</td>
    </tr>
    <tr>
      <td>Efthymios Koulouris</td>
    </tr>
  </table>
  <button id="positionFilterButton">Filtr pozycji</button>
  <h3 id="statystyki">Oto nasi najlepsi strzelcy</h3>
  <ol class="scorers">
    <li>Kamil Grosicki - 20 goli</li>
    <li>Vahan Bichakhchyan - 15 goli</li>
    <li>Efthymios Koulouris - 14 goli</li>
    <li>Luka Zahovic - 12 goli</li>
  </ol>
  <div class="container">
    <p>Nadchodzące mecze</p>
  </div>
  
  <section id="section1">
  <table id="terminarz" class="scheudle">
      <tr>
        <th colspan="4">Terminarz meczy</th>
      </tr>
      <tr>
        <td><strong>Rywal</strong></td>
        <td><strong>Data</strong></td>
        <td><strong>Wynik</strong></td>
        <td><strong>Typ</strong></td>
      </tr>
      <tr>
        <td>Lech Poznań</td>
        <td>18.10.2023</td>
        <td><button id="match1Bet">Wytypuj</button></td>
        <td id="match1Prediction"></td>
      </tr>
      <tr>
        <td>Raków Częstochowa</td>
        <td>24.10.2023</td>
        <td><button id="match2Bet">Wytypuj</button></td>
        <td id="match2Prediction"></td>
      </tr>
      <tr>
        <td>Legia Warszawa</td>
        <td>30.10.2023</td>
        <td><button id="match3Bet">Wytypuj</button></td>
        <td id="match3Prediction"></td>
      </tr>
  </table>
</section>
 
  <p class="empty">Pozostałe Spotkania</p>
  <p class="empty"></p>
  
  

  <p>Rozegrane Spotkania <meter min="1" max="34" high="20" low="3" value="13">13/34</meter>13/34</p>
  <aside class="last">
  
  <h3>Krótko o naszej historii</h3>
   
  <a href="http://ebp.pogonszczecin.pl/uploads/pliki/historia_pogoni_szczecin.pdf" download="pogon">Historia klubu w pdf</a>
  <a href="https://szczecin.ipn.gov.pl/pl9/publikacje/ksiazki-szczecin/158915,Pogon-Szczecin-Szkice-z-tajnej-historii.pdf" download>Książka- Pogoń Szczecin- Szkice z tajnej historii</a>
  <p>Linki</p>
  <a href="https://pogonszczecin.pl/newsy/20231108112027" >Pogon</a>
  </aside>
  <footer>
    <p>&copy; AUTHORS: Szymon Szafraniec, Leszek Kryzar </p>
  </footer>
</body>
</html>