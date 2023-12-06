<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Szczecin, informacja, turystyka, rozrywka, rekreacja, sport">
  <meta name="author" content="Szymon Szafraniec, Leszek Kryzar">
  <link rel="stylesheet" href="design.css">
  <title>Dodatkowe informacje</title>
</head>
<body>
<?php
// session_start();

// Odczytaj dane z sesji
$name = $_POST["Name"];
$surname = $_POST["Surname"];
$monthOfBirth = $_POST["month_of_birth"];
$email = $_POST["Email"];
$phone = $_POST["Telefon"];

$name_without_digits = preg_replace("/\d/", "", $name);
for ($i = 0; $i < strlen($surname); $i++) {
  $surname[$i] = strtoupper($surname[$i]);
}
$uppercaseName = "";
foreach (str_split($name_without_digits) as $letter) {
  $uppercaseName .= strtoupper($letter);
}
$clientIP = $_SERVER['REMOTE_ADDR'];
$condition = true;
if ($monthOfBirth == "Czerwiec") {
  // Jeśli warunek jest spełniony, przerwij skrypt i wyświetl komunikat
  die("Przepraszamy nie obsługujemy klientów z Czerwca");
}

echo "Adres IP klienta: " . $clientIP;
?>
<!-- Wyświetl dane -->
<p>Imię: <?php echo $uppercaseName; ?></p>
<p>Nazwisko: <?php echo $surname; ?></p>
<p>Miesiąc urodzenia: <?php echo $monthOfBirth; ?></p>
<p>Email: <?php echo $email; ?></p>
<p>Telefon: <?php echo $phone; ?></p>

  <h2>Chcemy poznać Cię bliżej</h2>
  <form method="post" action="http://localhost:5500/newsletter.html" autocomplete="on">
    <p>
      <label for="idColor">Wybierz  swój ulubiony kolor:</label>
      <input id="idColor" name="Color" type="color">
  </p>
  <p>
    <label for="idMonth">Kiedy chciałbyś odwiedzić Szczecin?</label>
    <input id="idMonth" name="Month" type="month" value="2023-10">
  </p>
  <p>
    <label for="idLikeSzczecin">Na ile oceniasz swoją wiedzę o Szczecinie?</label>
    0<input id="idLikeSzczecin" name="LikeSzcecin" type="range" value="75">100
  </p>
  <p>
    <label for="idInfoSzczecin">Czego chciałbyś się dowiedzieć o Szczecinie?</label>
    <input type="search" id="idInfoSzczecin" name="InfoSczecin" placeholder="Prezydent Szczecina">
  </p>
  <p>
    <label for="idURL">Padaj link do swojego Facebooka</label>
    <input type="url" id="idURL" name="URL" size="40" placeholder="https://www.facebook.com/?locale=pl_PL">
  </p>
  <input type="submit" value="Prześlij">
  <input type="reset" value="Wyczyść">

  </form>
  
</body>
</html>