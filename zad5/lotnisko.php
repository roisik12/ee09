<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port Lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <div id="baner1">
        <img src="zad5.png" alt="logo lotniska">
    </div>
    <div id="baner2">
        <h2>Przyloty</h2>
    </div>
    <div id="baner3">
        <h3>Przydatne linki</h3>
        <a href="kwerendy.txt" target="_blank">Pobierz...</a>
    </div>
    <div id="glowny">
        <table>
            <tr>
                <th>czas</th>
                <th>kierunek</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>
            <?php
            $polaczenie=mysqli_connect("localhost","root","","egzamin");
            $zapytanie1=mysqli_query($polaczenie,"select czas, kierunek, nr_rejsu, status_lotu from przyloty ORDER by 'czas' ASC;");
            while($chuj=mysqli_fetch_row($zapytanie1))
            {
                echo"<tr><td>".$chuj[0]."</td><td>".$chuj[1]."</td><td>".$chuj[2]."</td><td>".$chuj[3]."</td></tr>";
            }
            mysqli_close($polaczenie);
            ?>
        </table>
    </div>
    <div id="stopka1">
        <?php
            $nazwa_cookie="ciasteczka123";
            $wartosc_cookie = 0; 
            if(isset($_COOKIE[$nazwa_cookie]))
            {
                echo"<p><i>Witaj ponownie na stronie lotniska</i></p>";     
            }
            else
            {
                echo "<p font-size:bold;>Dzien dobry! Strona lotniska używa ciasteczek</p>";
                setcookie($nazwa_cookie, $wartosc_cookie, time()+7200);
            }
        ?>
    </div>
    <div id="stopka">
        Tekst:Autor
    </div>
</body>
</html>