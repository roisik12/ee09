<?php
            $polaczenie=mysqli_connect("localhost","root","","egzamin");
            $zapytanie1=mysqli_query($polaczenie,"select czas, kierunek, nr_rejsu, status_lotu from przyloty ORDER by 'czas' ASC;");
            while($chuj=mysqli_fetch_row($zapytanie1))
            {
                echo"<tr><td>".$chuj[0]."</td><td>".$chuj[1]."</td><td>".$chuj[2]."</td><td>".$chuj[3]."</td></tr>";
            }
            mysqli_close($polaczenie);
            ?>