<?php
include 'databaseCredentials.php';

try {
    $databaseConnection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    // set the PDO error mode to exception
    $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo var_export($databaseConnection);
    echo "Connected successfully, yay!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
