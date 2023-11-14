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
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Imię</span>
                <input type="text" class="form-control" placeholder="Imię" name="imie" aria-label="imie" value="<?php echo $wiersz1[1];?>" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nazwisko</span>
                <input type="text" class="form-control" placeholder="Nazwisko" name="nazwisko" aria-label="nazwisko" value="<?php echo $wiersz1[2];?>" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Id_klasy</span>
                <input type="text" class="form-control" placeholder="Id_klasy" name="id_klasa" aria-label="id_klasa" value="<?php echo $wiersz1[3];?>"aria-describedby="basic-addon1">
            </div>
            <input type="submit" class="btn btn-outline-dark" value="Zmień" />
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