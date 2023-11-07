<?php
include("includes/naglowek.php");
?>
    <div id="srodek" class="col-9 bg-light bg-gradient">
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dziennik');
            $id = $_GET['id'];
            $zapytanie1 = "SELECT * FROM uczen WHERE id=$id";
            $wynik1 = mysqli_query($polaczenie, $zapytanie1);
            $wiersz1 = mysqli_fetch_row($wynik1);
        ?>
        <form action="edycjaucznia.php" method="GET">
            <input type="hidden" name="id" value="<?php echo $wiersz1[0];?>" /> <br />
            Imię <input type="text" name="imie" value="<?php echo $wiersz1[1];?>" /> <br />
            Nazwisko <input type="text" name="nazwisko" value="<?php echo $wiersz1[2];?>" /> <br />
            Id_klasa <input type="text" name="id_klasa" value="<?php echo $wiersz1[3];?>" /> <br />
            <input type="submit" value="Zmień" />
        </form>
        <?php
            if(isset($_GET['imie']) && isset($_GET['nazwisko']) && isset($_GET['id_klasa'])){
                $id = $_GET['id']; 
                $imie = $_GET['imie'];
                $nazwisko = $_GET['nazwisko'];
                $id_klasa = $_GET['id_klasa'];
                $zapytanie2 = "UPDATE uczen SET id=$id, imie='$imie', nazwisko='$nazwisko', id_klasa=$id_klasa WHERE id=$id";
                $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                if($wynik2){
                    echo "Uczen $imie $nazwisko zmodyfikowany poprawnie";
                }else{
                    echo "Błąd edycji danych";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </div>
<?php
include("includes/stopka.php");
?>