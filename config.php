<?php

include('config_secret.php');

$db_username = $DB_USERNAME;
$db_password = $DB_PASSWORD;
$host = "localhost";
$database = "Rental_Project";

// Create connection
$conn = mysqli_connect($host, $db_username, $db_password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
