<!DOCTYPE html>
<html lang="pl">
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
    <div id="stopka">
        Strona stworzona w <?php echo date('Y-m-d'); ?>
    </div>
</body>
</html>