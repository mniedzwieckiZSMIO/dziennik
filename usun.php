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
    <div id="stopka">
        Strona stworzona w <?php echo date('Y-m-d'); ?>
    </div>
</body>
</html>