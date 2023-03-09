<?php
session_start();
// Connect to the database
include('config.php');
// Get Tenant details from form
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Email = $_POST['Email'];
$Phone= $_POST['Phone'];

// Insert payment into Tenant table
$sql = "INSERT INTO Tenant (FirstName, LastName, Email, Phone) VALUES ('$FirstName','$LastName','$Email','$Phone')";

if (mysqli_query($conn, $sql)) {
    echo "Tenant details recorded successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
