<?php
session_start();
setcookie("loginfo", session_id(), time() + 60 * 15);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Szczecin, newsletter, informacja, turystyka, rozrywka, rekreacja, sport">
    <meta name="author" content="Szymon Szafraniec, Leszek Kryzar">
    <link rel="stylesheet" href="design.css">
    <title>Logowanie</title>
</head>
<body>
<?php

include 'db_service.php';

$server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "DB";


define("sessionExpiryTime", 60 * 15, true);

if (isset($_SESSION["loginTimeStamp"]) && (time() - $_SESSION["loginTimeStamp"] > sessionExpiryTime)) {
    setcookie("loginfo","",time() - 99);
    session_unset(); 
    session_destroy();
}


$username = $password = "";
$username_error = $password_error = "";
$form_filled = true;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $username_error = "Wprowadź nazwę użytkownika!";
        $form_filled = false;
    } else {
        $username = $_POST["username"];
    }

    if (empty($_POST["password"])) {
        $password_error = "Wprowadź hasło!";
        $form_filled = false;
    } else {
        $password = $_POST["password"];
    }

    if ($form_filled) {
        $conn = mysqli_connect($server, $db_user, $db_password, $db_name);

        if (!$conn) {
            die("Connection failed: " . mysqli_error($conn));
        }

        $row = userData($conn, $username);

        if ($row) {
            if ($row[2] !== hash('sha256',$password)) $password_error = "Błędne hasło!";
            else {
                 $_SESSION["loggedIn"] = true;
                 $_SESSION["loginTimeStamp"] = time();
                 $_SESSION["username"] = $username;
                 header("Location: index.php");
                exit;
            }
         } else {
             $username_error = "Niepoprawny login!";
         }
    }
}


?>
<h2>Logowanie</h2>
    <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post" class="loginPanel">
        <label for="username">Nazwa użytkownika:</label>
        <input type="text" id="username" name="username">
        <span class="error">*<?php echo $username_error;?></span>
        <br><br>
        
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password">
        <span class="error">*<?php echo $password_error;?></span>
        
        <br><br>
        
        <input type="submit" value="Zaloguj">
    </form>


    <footer style="color: gray;">
        <p>&copy; AUTHORS: Szymon Szafraniec, Leszek Kryzar </p>
    </footer>
    
</body>
</html>