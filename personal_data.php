<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Szczecin, informacja, turystyka, rozrywka, rekreacja, sport">
    <meta name="author" content="Szymon Szafraniec, Leszek Kryzar">
    <link rel="stylesheet" href="design.css">
    <script src="personal_data.js" defer></script>
    <script src="zad5js2.js" defer></script>
    <title>Dane Osobowe</title>
</head>
<body class="personal_data_page">


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

<span class="usernameInfo"><?php echo $_SESSION["username"];?></span><br>
    
    <form method="post" action="extra_data.php" autocomplete="on"  name="personalDataForm" id="personal_form">
        <p>
            <label for="idName">Imię:</label>
            <input id="idName" name="Name" type="text" size="30" maxlength="25"  placeholder="Jan" autocomplete="given-name" class="personal"   autofocus>
            <p id="name_input" class="helpP">Wpisz  swoje imie</p>
        </p>

        <p>
            <label for="idSurname">Nazwisko:</label>
            <input id="idSurname" name="Surname" type="text" size="30" maxlength="25"  placeholder="Kowalski" autocomplete="family-name" required>
            <p id="surname_input" class="helpP">Wpisz  swoje nazwisko</p>
        </p>

        <p>
            <label for="idMonthOfBirth">Wybierz miesiąc urodzenia: </label>
            <input list="months" name="month_of_birth" id="idMonthOfBirth" placeholder="Styczeń" autocomplete="bday-month">
            <p id="month_input" class="helpP">Wpisz  miesiąc urodzenia</p>

            <datalist id="months">
                <option value="Styczeń">
                <option value="Luty">
                <option value="Marzec">
                <option value="Kwiecień">
                <option value="Maj">
                <option value="Czerwiec">
                <option value="Lipiec">
                <option value="Sierpień">
                <option value="Wrzesień">
                <option value="Październik">
                <option value="Listopad">
                <option value="Grudzień">
            </datalist>
        </p>
        
        <p>
            <label for="idEmail">E-mail &#128231;</label>
            <input  id="idEmail" name="Email" type="email" size="30" maxlength="25" placeholder="kowalskijan@gmail.com" 
            autocomplete="email" required>
            <p id="mail_input" class="helpP">Wpisz  swoj email</p>
        </p>

        <p>
            <label for="idPhone">Telefon &phone;:</label>
            <input id="idPhone" name="Telefon" type="tel" pattern="^\+\d{2} \d{3}-\d{3}-\d{3}$" 
            size="30" maxlength="15" placeholder="+XX XXX-XXX-XXX" autocomplete="tel">
            <p id="phone_input" class="helpP">Wpisz  swoj numer telefonu zgodny z paternem</p>
        </p>
        <input type="submit" value="Prześlij">
        <input type="reset" value="Wyczyść">
    </form>


    <button id="completeButton">PRZYKŁADOWE DANE</button>
</body>
</html>