<?php
include 'databaseConnectionPDO.php';

$sqlCreate1 = "CREATE TABLE auto (
rekisterinro char(7),
vari varchar(30),
vuosimalli int,
omistaja char(11),
PRIMARY KEY (rekisterinro),
FOREIGN KEY (omistaja) REFERENCES henkilo(hetu)
)";

$sqlCreate2 = "CREATE TABLE henkilo (
hetu char(11),
nimi varchar(50),
osoite varchar(100),
puhelinnumero varchar(20),
PRIMARY KEY (hetu)
)";

$sqlCreate3 = "CREATE TABLE sakko (
id int AUTO_INCREMENT,
pvm date,
summa double,
syy varchar(200),
auto char(7),
henkilo char(11),
PRIMARY KEY (id),
FOREIGN KEY (auto) REFERENCES auto(rekisterinro),
FOREIGN KEY (henkilo) REFERENCES henkilo(hetu)
)";

try {
    $databaseConnection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    // set the PDO error mode to exception
    $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // use exec() because no results are returned
    $databaseConnection->exec($sqlCreate2);
    echo "<br>";
    echo "Table henkilo created successfully";
    echo "<br>";
    $databaseConnection->exec($sqlCreate1);
    echo "Table auto created successfully";
    echo "<br>";
    $databaseConnection->exec($sqlCreate3);
    echo "Table sakko created successfully";
    echo "<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$databaseConnection = null;
