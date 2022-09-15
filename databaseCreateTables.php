<?php
include 'databaseConnectionMysqli.php';

$sqlCreate1 = "CREATE TABLE auto2 (
rekisterinro char(7),
vari varchar(30),
vuosimalli int,
omistaja char(11),
PRIMARY KEY (rekisterinro),
FOREIGN KEY (omistaja) REFERENCES henkilo2(hetu)
)";

$sqlCreate2 = "CREATE TABLE henkilo2 (
hetu char(11),
nimi varchar(50),
osoite varchar(100),
puhelinnumero varchar(20),
PRIMARY KEY (hetu)
)";

$sqlCreate3 = "CREATE TABLE sakko2 (
id int AUTO_INCREMENT,
pvm date,
summa double,
syy varchar(200),
auto2 char(7),
henkilo2 char(11),
PRIMARY KEY (id),
FOREIGN KEY (auto2) REFERENCES auto2(rekisterinro),
FOREIGN KEY (henkilo2) REFERENCES henkilo2(hetu)
)";

echo "<br>";
echo $sqlCreate1;
echo "<br>";
echo $sqlCreate2;
echo "<br>";
echo $sqlCreate3;

// if (mysqli_query($databaseConnection, $sqlCreate2)) {
//     echo "Table Auto created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($databaseConnection);
// }

// if (mysqli_query($databaseConnection, $sqlCreate1)) {
//     echo "Table Henkilo created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($databaseConnection);
// }

// if (mysqli_query($databaseConnection, $sqlCreate3)) {
//     echo "Table Sakko created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($databaseConnection);
// }

mysqli_close($databaseConnection);
