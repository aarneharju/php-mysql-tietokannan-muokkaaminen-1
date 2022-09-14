<?php
include 'databaseCredentials.php';

$databaseConnection = new mysqli($servername, $username, $password);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

echo "Connected succesfully";
