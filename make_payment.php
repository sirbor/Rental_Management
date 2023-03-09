<?php
// Start a session
session_start();

// Include the database configuration file
include('config.php');

// Check if the user is logged in
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Get payment details from form
$date = mysqli_real_escape_string($conn, $_POST['date']);
$amount = mysqli_real_escape_string($conn, $_POST['amount']);

// Insert payment into Payment table
$sql = "INSERT INTO Payment (Date, Amount) VALUES ('$date', '$amount')";

if (mysqli_query($conn, $sql)) {
    // Redirect the user back to the tenant dashboard
    header("Location: tenant.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
