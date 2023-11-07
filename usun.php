<?php
include("includes/naglowek.php");
?>
    <div id="srodek">
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dziennik');
            $id = $_GET['id_ucznia'];
            $zapytanie1 = "DELETE FROM uczen WHERE id=$id";
            $wynik1 = mysqli_query($polaczenie, $zapytanie1);
            if($wynik1){
                echo "Usunięto ucznia o id=$id";
            }else{
                echo "Błąd usuwania ucznia";
            }
            mysqli_close($polaczenie);
        ?>
    </div>
<?php
include("includes/stopka.php");
?>