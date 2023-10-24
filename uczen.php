<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="baner">
        <h1>Dziennik elektroniczny</h1>
    </div>
    <div id="menu">
        <ul>
            <li><a href="index.php">Strona glowna</a></li>
            <li><a href="uczen.php">Uczniowie</a></li>
        </ul>
    </div>
    <div id="srodek">
        <h1>Wybierz klasę</h1>
        <form action="uczen.php" method="post">
            <select name="klasa">
                <?php
                    $polaczenie = mysqli_connect('localhost', 'root', '', 'dziennik');
                    $zapytanie1 = "SELECT id, numer, oznaczenie FROM klasa";
                    $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                    while($wiersz1 = mysqli_fetch_row($wynik1)){
                        echo "<option value='$wiersz1[0]'>$wiersz1[1] $wiersz1[2]</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Pokaż" />
        </form>
        <form action="uczen.php" method="post">
            Imię <input type="text" name="imie" /> <br />
            Nazwisko <input type="text" name="nazwisko" /> <br />
            Id_klasa <input type="text" name="id_klasa" /> <br />
            <input type="submit" value="Dodaj" />
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
    <div id="stopka">
        Strona stworzona w <?php echo date('Y-m-d'); ?>
    </div>
</body>
</html>