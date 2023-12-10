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
    
    ?>
    <span class="usernameInfo"><?php echo $_SESSION["username"];?></span>
    <h1>PREFERENCJE</h1>
        <div id="preferences_container">
            <label class="bg_color_setup" for="bg_color_input">Kolor tła:</label>
            <input class="bg_color_setup" id="bg_color_input" type="color">
            <br>

            <label class="text_color_setup" for="text_color_input">Kolor tekstu:</label>
            <input class="text_color_setup" id="text_color_input" type="color">
            <br>

            <label class="font_family_setup" for="font_family_input">Rodzaj czcionki:</label>
            <select class="font_family_setup" id="font_family_input">
                <option value="Arial, sans-serif">Arial</option>
                <option value="Times New Roman, serif">Times New Roman</option>
                <option value="Courier New, monospace">Courier New</option>
            </select>
        </div>    
</body>
</html>