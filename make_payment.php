<?php
// Start a session
session_start();

// Include the database configuration file
include('config.php');


// Get payment details from form
$date = mysqli_real_escape_string($conn, $_POST['date']);
$amount = mysqli_real_escape_string($conn, $_POST['amount']);

// Insert payment into Payment table
$sql = "INSERT INTO Payment (Date, Amount) VALUES ('$date', '$amount')";

if (mysqli_query($conn, $sql)) {
    header('location: tenant.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
