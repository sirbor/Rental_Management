<?php
session_start();
// Connect to the database
include('config.php');
// Get payment details from form
$description = $_POST['description'];
$date = $_POST['date'];
$cost = $_POST['cost'];

// Insert payment into Payment table
$sql = "INSERT INTO Maintenance (Description,Date, Cost) VALUES ('$description', '$date',$cost)";

if (mysqli_query($conn, $sql)) {
    echo "Maintenance recorded successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
