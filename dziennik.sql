CREATE TABLE uczen(
    id_ucznia int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    imie char(30) NOT NULL, 
    nazwisko VARCHAR(50) NOT NULL,
    kod pocztowy CHAR(6) NOT NULL default '18-400'
);
CREATE USER 'janek'@'localhost' IDENTIFIED VIA mysql_native_password USING 'janek123';