<?php
include("includes/naglowek.php");
?>
    <div id="srodek" class="col-9 bg-light bg-gradient">
        <h3>Wybierz klasę</h3>
        <form action="uczen.php" method="post">
            <select name="klasa" class="form-select">
                <?php
                    $polaczenie = mysqli_connect('localhost', 'root', '', 'dziennik');
                    $zapytanie1 = "SELECT id, numer, oznaczenie FROM klasa";
                    $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                    while($wiersz1 = mysqli_fetch_row($wynik1)){
                        echo "<option value='$wiersz1[0]'>$wiersz1[1] $wiersz1[2]</option>";
                    }
                ?>
            </select>
            <input type="submit" class="btn btn-dark" value="Pokaż" />
        </form>
        <form action="uczen.php" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Imię</span>
                <input type="text" class="form-control" placeholder="Imię" name="imie" aria-label="imie" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nazwisko</span>
                <input type="text" class="form-control" placeholder="Nazwisko" name="nazwisko" aria-label="nazwisko" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Id_klasy</span>
                <input type="text" class="form-control" placeholder="Id_klasy" name="id_klasa" aria-label="id_klasa" aria-describedby="basic-addon1">
            </div>
            <input type="submit" class="btn btn-outline-dark"  value="Dodaj" />
        </form>
        <?php
            if(isset($_POST['imie']) && isset($_POST['nazwisko']) &&isset($_POST['id_klasa'])){
                $imie = $_POST['imie'];
                $nazwisko = $_POST['nazwisko'];
                $id_klasa = $_POST['id_klasa'];
                $zapytanie3 = "INSERT INTO uczen VALUES(null, '$imie', '$nazwisko', $id_klasa)";
                $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                if($wynik3){
                    echo "Uczen $imie $nazwisko dodany do bazy danych";
                }else{
                    echo "Błąd dodawania ucznia";
                }
            }
        
            if(isset($_POST['klasa'])){
                    
        ?>
        <table>
            <tr>
                <td>Lp</td>
                <td>Imię Nazwisko</td>
                <td>Usuń</td>
            </tr>
            <?php
                $idklasa = $_POST['klasa'];
                $zapytanie2 = "SELECT * FROM uczen WHERE id_klasa=$idklasa";
                $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                while($wiersz2 = mysqli_fetch_row($wynik2)){
                    echo "<tr>
                            <td>$wiersz2[0]</td>
                            <td>
                            <a href='edycjaucznia.php?id=$wiersz2[0]'>$wiersz2[1] $wiersz2[2]</a>
                            </td>
                            <td><a href='usun.php?id_ucznia=$wiersz2[0]'>usuń</a></td>
                        </tr>";
                }
            ?>
        </table>
        <?php } ?>
    </div>

<?php
include("includes/stopka.php");
?>