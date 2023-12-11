<?php
include 'preferences.php';

// Odczytanie preferencji użytkownika z ciastka
$preferences = getPreferencesFromCookie();
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
            font-family: <?php echo $preferences['font']; ?>;
            color: <?php echo $preferences['font_color']; ?>;
            background-color: <?php echo $preferences['bg_color']; ?>;
        }
    </style>
</head>
<body>
    <h1>Strona Diagnostyczna</h1>


    <h2>Aktualne preferencje użytkownika:</h2>
    <ul>
        <li>Kroj czcionki: <?php echo $preferences['font']; ?></li>
        <li>Kolor czcionki: <?php echo $preferences['font_color']; ?></li>
        <li>Kolor tła: <?php echo $preferences['bg_color']; ?></li>
    </ul>

    <!-- <footer style="color: gray;">
        <p>&copy; AUTHORS: Szymon Szafraniec, Leszek Kryzar </p>
    </footer> -->
    
</body>
</html>