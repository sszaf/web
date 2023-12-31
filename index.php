<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Szymon Szafraniec, Leszek Kryzar">
    <meta name="keywords" content="Szczecin, wiadomości, wydarzenia, historia, rozrywka, kultura, imprezy, lokale">
    <script src="index.js" defer></script>
    <link rel="stylesheet" href="design.css">
    <title>Szczecin</title>
</head>
<body>
<?php
include 'preferences.php';
$preferences = getPreferencesFromCookie();

// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['FontStyle'])) { 
//     // Pobranie danych z formularza
//     $selectedFont = $_POST['FontStyle'];
//     $selectedFontColor = $_POST['textColor'];
//     $selectedBgColor = $_POST['BGColor'];
//     // echo $selectedBgColor;
//     // echo "post";
//     unset($_POST['FontStyle']);
    

//     // Ustawienie ciastka z preferencjami użytkownika
//     setPreferencesCookie($selectedFont, $selectedFontColor, $selectedBgColor);
// } else {
//     // Odczytanie preferencji użytkownika z ciastka
//     $preferences = getPreferencesFromCookie();
//     $selectedFont = $preferences['font'];
//     $selectedFontColor = $preferences['font_color'];
//     $selectedBgColor = $preferences['bg_color'];
//     // echo $preferences['font'];  
//     // echo "niePost";
// }

?>

    <style>

        body {
            font-family: <?php echo $preferences['font']; ?>;
            color: <?php echo $preferences['font_color']; ?>;
            background-color: <?php echo $preferences['bg_color']; ?>;
                }
        
        #history_paragraph{
            font-size: 16pt;
            font-family: Arial, Helvetica, sans-serif;
            font-style: italic;
        }

        #entertainment_paragraph{
            font-size: 16pt;
            font-variant: small-caps;
            line-height: 25pt;
        }

    </style>
    
    <section>
        <nav class="menu">
            <ul>
                <li><a href="Atrakcje.html">ATRAKCJE</a>
                    <ul>
                        <li>ZABYTKI
                            <ul>
                                <li><a href="Atrakcje.html#brama_portowa">Brama Portowa</a></li>
                                <li><a href="Atrakcje.html#zamek_ksiazat_pomorskich">Zamek Książąt Pomorskich</a></li>
                            </ul>
                        </li>    
                        <li>SZTUKA
                            <ul>
                                <li><a href="Atrakcje.html#muzeum_narodowe">Muzeum Narodowe</a></li>
                                <li><a href="Atrakcje.html#filharmonia">Filharmonia</a></li>
                            </ul>
                        </li>    
                        <li>REKREACJA
                            <ul>
                                <li><a href="Atrakcje.html#jezioro_szmaragdowe">Jezioro Szmaragdowe</a></li>
                                <li><a href="Atrakcje.html#waly_chrobrego">Wały Chrobrego</a></li>
                            </ul>
                            </li>   
                    </ul>
                </li>
                <li><a href="pogon.php">POGOŃ SZCZECIN</a>
                    <ul>
                        <li>KLUB
                            <ul>
                                <li><a href="pogon.php#photo">Drużyna</a></li>
                                <li><a href="pogon.php#zespol">Skład</a></li>
                            </ul>
                        </li>    
                        <li>SEZON
                            <ul>
                                <li><a href="pogon.php#statystyki">Statystyki</a></li>
                                <li><a href="pogon.php#terminarz">Terminarz</a></li>
                            </ul>
                        </li>    
                    </ul>
                </li>
                <li>FORMULARZE
                    <ul>    
                            <li><a name="forms" href="personal_data.php">Dane Osobowe</a></li>
                            
                    </ul>
                </li>
                <li><a href="prefs.php">PREFERENCJE</a></li>
                <li><a href="game.php">Gra</a></li>
                <li><a href="authorization.php">Logowanie</a></li>
                <li><a href="authorization_info.php">Informacja logowania</a></li>
                <li><button id="ratingButton">OCEŃ</button></li>
                <li><a href="diagnostic.php">Diagnostyczna</a></li>
                <li><a href="db_table.php">Tabela</a></li>
                <li><a href="logout.php">Wyloguj</a></li>
                
                
            </ul>
        </nav>
    </section>
    <section>
        <h1 id="main_header">NAJLEPSZY PORTAL INFORMACYJNY O SZCZECINIE</h1>
        <div class="herb_container">
        <img id="herb" src="https://mm.pwn.pl/ency/jpg/215x171/1o/d88i1654.jpg" alt="Zdjęcie przedstawiające herb miasta Szczecin w oryginalnym rozmiarze.">
        </div>
    </section>

    
    <section>
        <h2>Tematy</h2>
    <article>
        <h3 id="history">HISTORIA MIASTA</h3>
        <a href="game.html">Gra</a>

        <p id="history_paragraph">
            <strong>Szczecin</strong>, położony nad rzeką Odrą w północno-zachodniej Polsce, ma bogatą i zróżnicowaną historię, która sięga setek lat wstecz. 
            Miasto było świadkiem wielu ważnych wydarzeń i zmian, które kształtowały jego oblicze na przestrzeni wieków.
            Wczesne dzieje Szczecina związane są z osadnictwem plemion zachodniosłowiańskich. W XII wieku miasto stało się częścią księstwa pomorskiego, pod rządami książąt Gryfitów. 
            W XIII wieku Szczecin uzyskał prawa miejskie, co przyczyniło się do jego rozwoju handlowego i gospodarczego. 
            W kolejnych wiekach miasto należało do różnych państw i księstw, w tym do Brandenburgii, Szwecji i Prus.
            W XIX wieku Szczecin zyskał na znaczeniu jako ważny port i ośrodek przemysłowy, zwłaszcza po połączeniu z siecią kolejową. 
            Po II wojnie światowej Szczecin stał się częścią Polski w wyniku zmiany granic, co przyniosło mu nowy etap rozwoju i odbudowy.
            W czasach PRL-u, Szczecin był ważnym ośrodkiem przemysłowym, naukowym i kulturalnym. Współcześnie miasto jest <mark>dynamicznym centrum gospodarczym, turystycznym i kulturalnym</mark>. 
            Znane jest z pięknych zabytków architektonicznych, wspaniałych muzeów, festiwali i imprez kulturalnych, a także ze swojego bogatego dziedzictwa historycznego, które nadal przyciąga turystów z całego świata.<br>
            
            <a href="https://pl.wikipedia.org/wiki/Szczecin#Historia">Odnośnik do artykułu na Wikipedii</a>    
        </p>
    </article>    
    <article>
        <h3 id="entertainment">ATRAKCJE</h3>
        <p id="entertainment_paragraph">
            <strong>Szczecin</strong>, malowniczo położony nad rzeką Odrą, oferuje swoim mieszkańcom i turystom wiele fascynujących atrakcji. 
            Na pierwszym miejscu warto odwiedzić Zamek Książąt Pomorskich, prawdziwą perełkę architektoniczną, która skrywa w sobie wiele tajemnic historycznych. 
            Spacerując Wałami Chrobrego, można podziwiać zachowane w świetnej kondycji budynki z XIX wieku oraz liczne pomniki, które przenoszą nas w dawne czasy Szczecina. 
            Jasne Błonia to miejsce, gdzie miłośnicy przyrody i spacerów znajdą swoje miejsce, tworząc atmosferę spokoju i relaksu. 
            Szczecin słynie również ze swoich fascynujących muzeów, takich jak Muzeum Narodowe czy Muzeum Techniki i Komunikacji, które przyciągają miłośników kultury i nauki. 
            Fontanna Wieloryb to nie tylko oryginalne dzieło sztuki, ale także popularne miejsce spotkań i relaksu. Park Kasprowicza, otoczony zielenią i pięknymi alejami, to doskonałe miejsce na wypoczynek i zabawę dla rodzin z dziećmi. 
            Stare Miasto z wąskimi uliczkami, klimatycznymi kawiarniami i zachowaną architekturą przeszłości przyciąga miłośników historii i atmosfery dawnych czasów.
            To tylko niewielki wycinek atrakcji Szczecina, który zapewnia niezapomniane przeżycia dla każdego odwiedzającego.<br><br>
        </p>
            Najpopularniejsze atrakcje:
            <ul>
                <li>Zamek Książąt Pomorskich</li>
                <li>Wały Chrobrego</li>
                <li>Katedra św. Jakuba</li>
                <li>Fontanna Szczecin</li>
                <li>Park im. Jana Kasprowicza</li>
                <li>Wieża widokowa na Bukowym Wzgórzu</li>
                <li>Stare Miasto</li>
                <li>Centrum Dialogu Przełomy</li>
                <li>Pomnik Jana Pawła II</li>
            </ul>
            
            <a href="atrakcje.html">Odwiedź naszą stronę o atrakcjach Szczecina!</a>  
    </article>

    <article>
        <h3 id="division">Podział Administracyjny</h3>
        <p>
            Miasto jest podzielone na 37 osiedli administracyjnych. 
            Ponadto Szczecin jest podzielony na 4 dzielnice: Północ, Prawobrzeże, Śródmieście, Zachód.
            Obecny podział administracyjny Szczecina funkcjonuje od 1990 roku, z niewielkimi zmianami granic 
            osiedli i dzielnic oraz zmianami statutu osiedli.

            Źródło: <a href="https://pl.wikipedia.org/wiki/Podzia%C5%82_administracyjny_Szczecina">Wikipedia</a>
        </p>
        <ul>
            <li><strong>Śródmieście:</strong>
                <ul>
                    <li>Centrum</li>
                    <li>Drzetowo-Grabowo</li>
                    <li>Łękno</li>
                    <li>Międzyodrze-Wyspa Pucka</li>
                    <li>Niebuszewo-Bolinko</li>
                    <li>Nowe Miasto</li>
                    <li>Stare Miasto</li>
                    <li>Turzyn</li>
                </ul>
            </li>
            <li><strong>Północ:</strong>
                <ul>
                    <li>Bukowo</li>
                    <li>Golęcino</li>
                    <li>Niebuszewo</li>
                    <li>Skolwin</li>
                    <li>Warszewo</li>
                    <li>Żelechowa</li>
                </ul>
            </li>
            <li><strong>Zachód:</strong>
                <ul>
                    <li>Arkońskie</li>
                    <li>Głębokie</li>
                    <li>Gumieńce</li>
                    <li>Krzekowo-Bezrzecze</li>
                    <li>Osów</li>
                    <li>Pogodno</li>
                    <li>Pomorzany</li>
                    <li>Świerczewo</li>
                    <li>Zawadzkiego-Klonowica</li>
                </ul>
            </li>
            <li><strong>Prawobrzeże:</strong>
                <ul>
                   <li> Dąbie</li>	
                    <li>Kijewo</li>	
                    <li>Majowe</li>
                    <li>Płonia-Śmierdnica-Jezierzyce</li>
                    <li>Podjuchy</li>
                    <li>Słoneczne</li>
                    <li>Wielgowo-Sławociesze-Zdunowo</li>
                    <li>Załom-Kasztanowe</li>
                    <li>Zdroje</li>
                    <li>Żydowce-Klucz</li>
                </ul>
            </li>
        </ul>
        
    </article>

    <article class="pogon">
        <h3 class="pogo" id="pogon_szczecin">POGOŃ SZCZECIN</h3>
        <div class="pogon">
            <p class="pogon">
                <strong>Pogoń Szczecin</strong> to polski klub piłkarski z siedzibą w Szczecinie, założony w 1948 roku. 
                Jest jednym z najstarszych i najbardziej utytułowanych klubów w Polsce. 
                Pogoń Szczecin swoje mecze rozgrywa na stadionie imienia Floriana Krygiera, który może pomieścić <mark>ponad 18 000 widzów</mark>.
                Klub zdobył wiele tytułów i wyróżnień w polskim futbolu, w tym Puchar Polski oraz Superpuchar Polski. 
                Zespół ma silne wsparcie kibiców i jest jednym z najbardziej rozpoznawalnych klubów w Polsce. Pogoń Szczecin odgrywa istotną rolę w lokalnej społeczności, 
                inspirując młodych adeptów piłki nożnej i integrując fanów z różnych grup wiekowych.
            </p>
            <aside class="pogon">
                <h4>Barwy klubowe</h4>
                <p>Barwami Pogoni Szczecin są granatowy oraz bordowy. Stanowią one nawiązanie do herbu i flagi miasta.</p>
            </aside>
            <br>
            <a href = "pogon.php">
                <img src="pogoń.jpg" class="pogon" alt="Zdjęcie przedstawiające logo Pogonii Szczecin" height="75" width="75">
            </a>
        </div>
        

    </article>
    </section>
    
    <section>
        <h2>Herb miasta</h2>
        <img src="https://mm.pwn.pl/ency/jpg/215x171/1o/d88i1654.jpg" alt="Zdjęcie przedstawiające herb miasta Szczecin w rozmiarze 100x100." height="100" width="100">
        <img src="https://mm.pwn.pl/ency/jpg/215x171/1o/d88i1654.jpg" alt="Zdjęcie przedstawiające herb miasta Szczecin w rozmiarze 75x75." height="75" width="75">
    </section>

    <section>
    <h2>Czy wiesz, że?</h2>
    <details>
        <summary>Czy wiesz, że?</summary>
        <p>Układ trzech głównych palców w Szczecinie stanowi odzwierciedlenie położenia układu konstelacji Orion w stosunku 
            do Mlecznej Drogi i stosunek piramid w Gizie do Nilu.</p>
    </details>

    <details>
        <summary>Czy wiesz, że?</summary>
        <p>Kino Pionier założone w roku 1909 to jedno z najstarszych na świecie kin, które działają nieprzerwanie aż do dzisiaj.</p>
    </details>
    </section>

    <section>
        <h2>LOSOWY LINK NA STRONIE</h2>
        <button id="randomLinkButton">LOSOWY LINK</button>
    </section>
    
    <section>
        <h2 name="forms">Formularze</h2>
        <a href="newsletter.html">Zapisz mnie do newslettera</a>
        <a href="personal_data.html">Dane osobowe</a>
        <button id="openFormsButton">OTWÓRZ FORMULARZE</button>
    </section>

    
    <footer style="color: gray;">
        <p>&copy; AUTHORS: Szymon Szafraniec, Leszek Kryzar </p>
    </footer>

</body>
</html>