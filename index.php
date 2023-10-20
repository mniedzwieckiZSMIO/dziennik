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
        <h1>Witaj na stronie dziennika elektronicznego</h1>
    </div>
    <div id="stopka">
        Strona stworzona w <?php echo date('Y-m-d'); ?>
    </div>
</body>
</html>