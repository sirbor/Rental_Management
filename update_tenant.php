<?php
session_start();
// Connect to the database
include('config.php');

//Get user type and username from session
$usertype = $_SESSION['username'];

// Get Tenant details from form
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Email = $_POST['Email'];
$Phone= $_POST['Phone'];

$query = "INSERT INTO Tenant(FirstName, LastName, Email, Phone) VALUES ('$FirstName', '$LastName', '$Email', '$Phone')";
mysqli_query($conn, $query);

header('location: tenant.php');
exit();
?>
