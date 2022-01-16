<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje BMI</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <div id="logo">
        <img src="wzor.png" alt="wzór BMI">
    </div>
    <div id="baner">
        <h1>Oblicz swoje BMI</h1>
    </div>
    <div id="glowny">
        <table>
            <tr>
                <th>Interpretacja BMI</th>
                <th>Wartosc minimalna</th>
                <th>Wartosc maksymalna</th>
            </tr>
            <?php
            $polaczenie=mysqli_connect("localhost","root","","egzamin");
            $zapytanie1=mysqli_query($polaczenie,"SELECT informacja, wart_min, wart_max FROM bmi;");
            while($chuj=mysqli_fetch_row($zapytanie1))
            {
                echo"<tr><td>".$chuj[0]."</td><td>".$chuj[1]."</td><td>".$chuj[2]."</td></tr>";
            }
            mysqli_close($polaczenie);
            ?>
        </table>
    </div>
    <div id="lewy">
        <h2>Podaj wagę i wzrost</h2>
        <form action="bmi.php" method="POST">
            Waga:<input type="number" name="waga" min="1"/><br>
            Wzrost w cm:<input type="number" name="wzrost" min="1"/><br>
            <button type="submit">Oblicz i zapamiętaj wynik</button>
        </form>
        <?php
        $waga=@$_POST['waga'];
        $wzrost=@$_POST['wzrost'];
        if($waga==null or $wzrost==null){
        }
        else{
            $bmi=($waga/($wzrost*$wzrost))*10000;
            $bmi = floor($bmi);
            echo "Twoja waga: ".$waga." Twoj wzrost: ".$wzrost."<br>Obliczona wartosc BMI: ".$bmi;
            $bmi_id;
            if($bmi>=0 and $bmi<=18){
                $bmi_id=1;
            }
            elseif($bmi>=19 and $bmi<=25){
                $bmi_id=2;
            }
            elseif($bmi>=26 and $bmi<=30){
                $bmi_id=3;
            }
            elseif($bmi>=31 and $bmi<=100){
                $bmi_id=4;
            }
        }
        $data=date("Y-m-d");
        $polaczenie=mysqli_connect("localhost","root","","egzamin");
        $zapytanie2=mysqli_query($polaczenie,"INSERT INTO wynik (bmi_id, data_pomiaru,wynik) VALUES('".$bmi_id."','".$data."','".$bmi."');");
        mysqli_close($polaczenie);
        ?>
    </div>
    <div id="prawy">
        <img src="rys1.png" alt="ćwiczenia">
    </div>
    <footer>
        Autor:PESEL
        <a href="kwerendy.txt">Zobacz kwerendy</a>
</footer>
</body>
</html>