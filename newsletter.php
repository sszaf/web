<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Szczecin, newsletter, informacja, turystyka, rozrywka, rekreacja, sport">
    <meta name="author" content="Szymon Szafraniec, Leszek Kryzar">
    <link rel="stylesheet" href="design.css">
    <title>Newsletter informacyjny</title>
</head>
<body class="newsletter_page">
    <h1>UZUPEŁNIJ ABY DOŁĄCZYĆ DO NEWSLETTERA!</h1>
    <p>Korzystanie z newslettera zapewnia uzyskiwanie informacji na temat atrakcji na terenie całego miasta.<br>
    Wybierz interesujące Cię kategorie i spędź niezapomniany czas tak jak lubisz.</p>


    <?php
    $nameErr = $surnameErr = $emailErr = $phoneErr = $genderErr = $interestErr = $restErr = "";
    $name = $surename = $email = $phone = $gender = $rest = "";
    define("INTEREST_NUMBER",7,true);
    $interest = array();


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

        if (empty($_POST["Gender"])) {
            $genderErr = "Płeć jest wymagana!";
        } else {
            $gender = $_POST["Gender"];
        }

        if (empty($_POST["interest"])) {
            $interestErr = "Wybierz conajmniej jedną kategorię!";
        } else {
            $interest = $_POST['interest'];
        }

        if (($_POST["category"]) === "brak") {
            $restErr = "Należy wybrać miejsce z listy!";
            echo $restErr;
        } else {
            $rest = $_POST["category"];
        }

    }


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data); 
        return $data;
        }
    ?>


    <form method="post" action=<?php echo $_SERVER["PHP_SELF"];?> class="newsletter">
    <p>
        <label for="idName">Imię:</label>
        <input id="idName" name="Name" type="text" size="30" maxlength="25"  placeholder="Jan">
        <span  class="error">*<?php echo $nameErr;?></span>
    </p>
    <p>    
        <label for="idSurname">Nazwisko:</label>
        <input id="idSurname" name="Surname" type="text" size="30" maxlength="50"  placeholder="Kowalski">
        <span  class="error">*<?php echo $surnameErr;?></span>
    </p>
    
    <p>
        <label for="idEmail">E-mail &#128231;:</label>
        <input id="idEmail" name="Email"  size="30" maxlength="25"  placeholder="kowalskijan@gmail.com">
        <span  class="error">*<?php echo $emailErr;?></span>
    </p>
    <p>
        <label for="idPhone">Telefon &phone;:</label>
        <input id="idPhone" name="Phone" type="tel" size="30" maxlength="11"  placeholder="XXX-XXX-XXX">
        <span  class="error">*<?php echo $phoneErr;?></span>
    </p>
    <p>
        <label for="idMale">Mężczyzna</label>
        <input id="idMale" name="Gender" type="radio" value="Mężczyzna">   
        <label for="idFemale">Kobieta</label>
        <input id="idFemale" name="Gender" type="radio" value="Kobieta">

        <span  class="error">*<?php echo $genderErr;?></span>
    </p>

    <p>
        <input id="idMusic" type="checkbox" name="interest[]" value="Muzyka">
        <label for="idMusic">Muzyka</label>

        <input id="idArt" type="checkbox" name="interest[]" value="Sztuka">
        <label for="idArt">Sztuka</label>

        <input id="idFood" type="checkbox" name="interest[]" value="Gastronomia">
        <label for="idFood">Gastronomia</label>

        <input id="idSport" type="checkbox" name="interest[]" value="Sport">
        <label for="idSport">Sport</label>

        <input id="idEducation" type="checkbox" name="interest[]" value="Nauka">
        <label for="idEducation">Nauka</label>

        <input id="idTravel" type="checkbox" name="interest[]" value="Turystyka">
        <label for="idTravel">Turystyka</label>

        <input id="idRest" type="checkbox" name="interest[]" value="Wypoczynek">
        <label for="idRest">Wypoczynek</label>
        
        <span  class="error">*<?php echo $interestErr;?></span>
    </p>



    <p>
    <label for="categories">Ulubione Miejsce</label>
    <select id="categories" name="category">
        <optgroup label="Brak">
            <option>brak</option>
        </optgroup>
        <optgroup label="Historia Szczecina">
            <option>Zamek Książąt Pomorskich</option>
            <option>Wały Chrobrego</option>
            <option>Muzeum Narodowe</option>
        </optgroup>
        <optgroup label="Atrakcje Turystyczne">
            <option>Park Kasprowicza</option>
            <option>Jasne Błonia</option>
        </optgroup>
        <optgroup label="Gastronomia">
            <option>Restauracja Ratuszowa</option>
            <option>Port Marina</option>
        </optgroup>
        <optgroup label="Edukacja i Kultura">
            <option>Uniwersytet Szczeciński</option>
            <option>Teatr Współczesny</option>
            <option>Filharmonia</option>
            <option>Centrum Dialogu Przełomy</option>
            <option>Kino "Pionier"</option>
        </optgroup>
        <optgroup label="Przyroda">
            <option>Las Arkoński</option>
            <option>Trasa rowerowa Dolina Dolnej Odry</option>
            <option>Katedra Leśna</option>
        </optgroup>
        <optgroup label="Sport i Rekreacja">
            <option>Stadion Floriana Krygiera</option>
            <option>Basen Olimpijski</option>
            <option>Szlaki Rowerowe</option>
        </optgroup>
    </select>
    <span  class="error">*<?php echo $restErr;?></span>
</p>


    <p>
        <textarea id="idTextArea" name="TextArea" maxlength="200" rows="20" cols="50"></textarea>
    </p>
    <input type="submit" value="Prześlij">
    <input type="reset" value="Wyczyść">
    </form>
    <br>

    <h2>Wybrane kategorie 
    <?php 

    define("interest_num",7,true);
    $amount = number_format(count($interest)/interest_num * 100,2);
    echo '('  . $amount . '%)';
    if (($amount > 70.00)) {
        echo "&#x2764";
    }
    elseif ($amount >= 50.00) {
        echo "&#x1F600";
    } 

    
    
    ?>
    
    </h2>
    <p>
    <?php
        
        $ratings = 
        [
            "Muzyka" => 3,
            "Sztuka" => 4,
            "Gastronomia" => 4,
            "Sport" => 5,
            "Nauka" => 3,
            "Turystyka" => 3,
            "Wypoczynek" => 4
        ];

        reset($interest); //ensure that starting from the first element

        if (count($interest) !== 0) {
        do {
            echo (string)(key($interest) + 1) . ". " . current($interest) . "; rating: " . $ratings[current($interest)] .  "<br>";
        } while (next($interest) !== false);
    }
    
    ?>
    </p>

    <p>
        <?php 

        define("phrase_len",21,true);
                if (strcasecmp($rest,"Las Arkoński") == 0) {
                    echo "Miłośnik przyrody.";
                } elseif ($rest == "Muzeum Narodowe") {
                    echo "Pasjonat Historii.";
                } elseif (strncasecmp($rest,"Restauracja Ratuszowa",PHRASE_LEN) == 0) {
                    echo "Miłośnik Dobrej Kuchnii";
                } else {
                    echo "Sympatyk Szczecina.";
                }

        

        ?>
    </p>
    <a href="mailto:266605@student.pwr.edu.pl?subject=Newsletter%20Szczecin&body=Wiadomość%20wysłana%20z%20formularza.">Wyślij wiadomość e-mail</a>
    
    <footer>
        <p>&copy; AUTHORS: Szymon Szafraniec, Leszek Kryzar </p>
    </footer>
</body>
</html>