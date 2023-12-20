<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Szczecin, newsletter, informacja, turystyka, rozrywka, rekreacja, sport">
    <meta name="author" content="Szymon Szafraniec, Leszek Kryzar">
    <link rel="stylesheet" href="design.css">
    <title>Informacja logowania</title>
</head>
<body>


<?php
define("sessionExpiryTime", 60 * 15, true);

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

<div class="loginInfo">
    <span><?php echo "Witaj, " . $_SESSION["username"];?></span><br>
    <span><?php echo $_COOKIE["loginfo"];?></span><br>
    <span><?php echo sessionExpiryTime - (time() - $_SESSION["loginTimeStamp"])?></span>
</div>


</body>
</html>