<?php
session_start();
session_unset(); // Usuwa wszystkie zmienne sesyjne
session_destroy(); // Zamyka sesję

// Zerowanie ciasteczka loginfo
setcookie("loginfo", "", time() - 3600);

header("Location: index.php"); // Przekieruj użytkownika na stronę logowania
exit();
?>
