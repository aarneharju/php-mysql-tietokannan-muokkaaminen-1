<?php
include 'databaseCredentials.php';

$databaseConnection = mysqli_connect($servername, $username, $password, $database);

echo $servername;
echo $databaseConnection;

if (!$databaseConnection) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($databaseConnection, "utf8");

echo "Connected succesfully";
