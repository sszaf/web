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
//define("sessionExpiryTime", 60 * 15, true);

// if (isset($_SESSION["loginTimeStamp"]) && (time() - $_SESSION["loginTimeStamp"] > sessionExpiryTime)) {
//     setcookie("loginfo","",time() - 99);
//     session_unset(); 
//     session_destroy();
// }


// if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
//     header("Location: authorization.php");
//     exit;
// }


$server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "DB";

$insert_message = "x";

$nameErr = $surnameErr = $emailErr = $phoneErr = $bmonthErr = $usernameErr = $passwordErr = "";
$name = $surename = $email = $phone = $bmonth = $username = $password  = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["Name"])) {
            $nameErr = "Imię jest wymagane!";
        } else {
            $name = test_input($_POST["Name"]);

            if (!preg_match("/^[A-Z][a-z]+$/",$name)) {
                $nameErr = "Tylko litery (pierwsza wielka)!";
            }
        }


        if (empty($_POST["Surname"])) {
            $surnameErr = "Nazwisko jest wymagane!";
        } else {
            $surname = test_input($_POST["Surname"]);

            if (!preg_match("/^[A-Z][a-z]+$/",$surname)) {
                $surnameErr = "Tylko litery (pierwsza wielka)!";
            }
        }

        if (empty($_POST["Email"])) {
            $emailErr = "Email jest wymagany!";
        } else {
            $email = test_input($_POST["Email"]);

            if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
                $emailErr = "Niepoprawny format adresu email!";
            }
        }

        if (empty($_POST["Phone"])) {
            $phoneErr = "Telefon jest wymagany!";
        } else {
            $phone = test_input($_POST["Phone"]);

            if (!preg_match("/^[0-9]{3}\-[0-9]{3}\-[0-9]{3}$/",$phone)) {
                $phoneErr = "Oczekiwany format: \"XXX-XXX-XXX\"";
            }
        }

        if (empty($_POST["month_of_birth"])) {
            $bmonthErr = "Miesią urodzenia jest wymagany!";
        } else {
            $bmonth = $_POST["month_of_birth"];
        }


        if (empty($_POST["Username"])) {
            $usernameErr = "Nazwa użytkownika jest wymagana!";
        } else {
            $username = test_input($_POST["Username"]);

            if (!preg_match("/^[a-zA-Z][a-zA-Z0-9_!@#$%^&]{3,19}$/",$username)) {
                $usernameErr = "Niepoprawna nazwa użytkownika";
            }
        }


        if (empty($_POST["Password"])) {
            $passwordErr = "Hasło jest wymagane!";
        } else {
            $password = test_input($_POST["Password"]);

            if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*#?&]{10,}$/",$password)) {
                $passwordErr = "Hasło nie spełnia kryteriów!";
            }
        }


        $errors = [
            $nameErr,
            $surnameErr,
            $phoneErr,
            $emailErr,
            $bmonthErr,
            $usernameErr,
            $passwordErr
        ];
        if (no_errors_occured($errors)) {
            $insert_message = "no errors";
            if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] === false) {
                $conn = mysqli_connect($server, $db_user, $db_password, $db_name);
                $insert_message = "no logged";

                if (!$conn) {
                    die("Connection failed: " . mysqli_error($conn));
                } else {
                    $sql = "SELECT username FROM Users";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $usernames = mysqli_fetch_all($result, MYSQLI_ASSOC);

                        if (!username_exists($usernames, $username)) {

                            $hashed_password = hash("sha256", $password);

                            $query = "INSERT INTO Users (username, password, name, surname, email, phone, birth_month) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)";

                            $stmt = mysqli_prepare($conn, $query);

                            mysqli_stmt_bind_param($stmt, "sssssss", $username, $hashed_password, 
                            $name, $surname, $email, $phone, $bmonth);

                            $success = mysqli_stmt_execute($stmt);

                            if ($success) {
                                $insert_message = "Pomyślnie zarejestrowano!";
                            } else {
                                $insert_message = "Niepowodzenie rejstracji:" . mysqli_error($conn);
                            }

                            mysqli_close($conn);
                        } 
                    }
                }

                
            }
        }
    }


    // function no_errors_occured() {
    //     return !($nameErr || $surnameErr || $emailErr || 
    //     $phoneErr || $bmonthErr || $usernameErr || $passwordErr);
    // }

    function no_errors_occured($errors) {
        $filteredArray = array_filter($errors, function ($error) {
            return $error !== "";
        });

        return count($filteredArray) == 0;
    }


    function username_exists($usernames, $username) {
        $usernameExists = false;
        foreach ($usernames as $user) {
            if ($user['username'] === $username) {
                $usernameExists = true;
                break;
            }
        }
        return $usernameExists;
    }


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data); 
        return $data;
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

    
    <form method="post" action=<?php echo $_SERVER["PHP_SELF"];?> name="personalDataForm" id="personal_form">
        <p>
            <label for="idName">Imię:</label>
            <input id="idName" name="Name" type="text" size="30" maxlength="25"  placeholder="Jan" autocomplete="given-name" class="personal"   autofocus>
            <span class="error">*<?php echo $nameErr;?></span>
            <p id="name_input" class="helpP">Wpisz  swoje imię</p>
        </p>

        <p>
            <label for="idSurname">Nazwisko:</label>
            <input id="idSurname" name="Surname" type="text" size="30" maxlength="25"  placeholder="Kowalski" autocomplete="family-name">
            <span class="error">*<?php echo $surnameErr;?></span>
            <p id="surname_input" class="helpP">Wpisz  swoje nazwisko</p>
        </p>

        <p>
            <label for="idMonthOfBirth">Wybierz miesiąc urodzenia: </label>
            <input list="months" name="month_of_birth" id="idMonthOfBirth" placeholder="Styczeń" autocomplete="bday-month">
            <span class="error">*<?php echo $bmonthErr;?></span>
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
            autocomplete="email">
            <span class="error">*<?php echo $emailErr;?></span>
            <p id="mail_input" class="helpP">Wpisz  swoj email</p>
        </p>

        <p>
            <label for="idPhone">Telefon &phone;:</label>
            <input id="idPhone" name="Phone" type="tel" size="30" maxlength="15" placeholder="XXX-XXX-XXX" autocomplete="tel">
            <span class="error">*<?php echo $phoneErr;?></span>
            <p id="phone_input" class="helpP">Wpisz  swoj numer telefonu zgodny z paternem</p>
        </p>

        <p>
            <label for="idUsername">Nazwa użytkownika:</label>
            <input id="idUsername" name="Username" type="text" placeholder="Nazwa użytkownika">
            <span class="error">*<?php echo $usernameErr;?></span>
        </p>

        <p>
            <label for="idPassword">Hasło:</label>
            <input id="idPassword" name="Password" type="password" placeholder="Hasło">
            <span class="error">*<?php echo $passwordErr;?></span>
        </p>
        <input type="submit" value="Prześlij">
        <input type="reset" value="Wyczyść">
    </form>

    <span><?php echo $insert_message;?></span>


    <button id="completeButton">PRZYKŁADOWE DANE</button>
</body>
</html>