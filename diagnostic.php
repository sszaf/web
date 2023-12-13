<?php
include 'preferences.php';

// Odczytanie preferencji użytkownika z ciastka
// $preferences = getPreferencesFromCookie();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['FontStyle'])) { 
    // Pobranie danych z formularza
    $selectedFont = $_POST['FontStyle'];
    $selectedFontColor = $_POST['textColor'];
    $selectedBgColor = $_POST['BGColor'];
    // echo $selectedBgColor;
    // echo "post";
    unset($_POST['FontStyle']);
    

    // Ustawienie ciastka z preferencjami użytkownika
    setPreferencesCookie($selectedFont, $selectedFontColor, $selectedBgColor);
} else {
    // Odczytanie preferencji użytkownika z ciastka
    $preferences = getPreferencesFromCookie();
    $selectedFont = $preferences['font'];
    $selectedFontColor = $preferences['font_color'];
    $selectedBgColor = $preferences['bg_color'];
    // echo $preferences['font'];  
    // echo "niePost";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona Diagnostyczna</title>
    <link rel="stylesheet" href="design.css">
    <style>
        body {
            font-family: <?php echo $selectedFont; ?>;
            color: <?php echo $selectedFontColor; ?>;
            background-color: <?php echo $selectedBgColor; ?>;
        }
    </style>
</head>
<body>
    <h1>Strona Diagnostyczna</h1>


    <h2>Aktualne preferencje użytkownika:</h2>
    <ul>
        <li>Kroj czcionki: <?php echo $selectedFont; ?></li>
        <li>Kolor czcionki: <?php echo $selectedFontColor; ?></li>
        <li>Kolor tła: <?php echo $selectedBgColor; ?></li>
    </ul>
    <a href="index.php">Powrót do Strony Głównej</a>
    

    <!-- <footer style="color: gray;">
        <p>&copy; AUTHORS: Szymon Szafraniec, Leszek Kryzar </p>
    </footer> -->
    
</body>
</html>