<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Szymon Szafraniec, Leszek Kryzar">
    <meta name="keywords" content="Szczecin, wiadomości, wydarzenia, historia, rozrywka, kultura, imprezy, lokale">
    <link rel="stylesheet" href="design.css">
    <script src="prefs.js"></script>
    <title>Preferencje</title>
</head>
<body>
    <?php
    
    define("sessionExpiryTime", 120, true);

if (isset($_SESSION["loginTimeStamp"]) && (time() - $_SESSION["loginTimeStamp"] > sessionExpiryTime)) {
    setcookie("loginfo","",time() - 99);
    session_unset(); 
    session_destroy();
}


if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header("Location: authorization.php");
    exit;
}
include 'preferences.php';

// Sprawdzenie, czy formularz został przesłany
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_preferences'])) {
//     $fontFamilyInput = isset($_POST['font_family_input']) ? $_POST['font_family_input'] : '';
//     $textColorInput = isset($_POST['text_color_input']) ? $_POST['text_color_input'] : '';
//     $bgColorInput = isset($_POST['bg_color_input']) ? $_POST['bg_color_input'] : '';

//     // Ustawienie ciastka z preferencjami
    
//     setPreferencesCookie($fontFamilyInput, $textColorInput, $bgColorInput);

//     // Przekierowanie z powrotem na stronę główną
//     header("Location: index.php");
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Szymon Szafraniec, Leszek Kryzar">
    <meta name="keywords" content="Szczecin, wiadomości, wydarzenia, historia, rozrywka, kultura, imprezy, lokale">
    <link rel="stylesheet" href="design.css">
    <script src="prefs.js"></script>
    <title>Preferencje</title>
</head>
<body>
    <span class="usernameInfo"><?php echo $_SESSION["username"];?></span>
    <h1>PREFERENCJE</h1>
    <div id="preferences_container">
        <form method="post" action="index.php">
            <label class="bg_color_setup" for="bg_color_input">Kolor tła:</label>
            <input class="bg_color_setup" id="bg_color_input" name="BGColor" type="color">
            <br>

            <label class="text_color_setup" for="text_color_input">Kolor tekstu:</label>
            <input class="text_color_setup" id="text_color_input" name="textColor" type="color">
            <br>

            <label class="font_family_setup" for="font_family_input">Rodzaj czcionki:</label>
            <select class="font_family_setup" id="font_family_input" name="FontStyle">
                <option value="Arial, sans-serif">Arial</option>
                <option value="Times New Roman, serif">Times New Roman</option>
                <option value="Courier New, monospace">Courier New</option>
            </select>
            <button type="submit">Zapisz preferencje</button>
        </form>    
    </div>    
</body>
</html>