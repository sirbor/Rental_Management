<?php
session_start();
include('config.php');

if (isset($_POST['signup'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $usertype = mysqli_real_escape_string($conn, $_POST['usertype']);

    // Check if the username is already taken
    $query = "SELECT * FROM User WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error'] = "Username is already taken";
        header('location: index.php');
        exit();
    }

    // Insert the user into the database
    $query = "INSERT INTO User (username, password, usertype) VALUES ('$username', '$password', '$usertype')";
    mysqli_query($conn, $query);

    // Redirect to the appropriate dashboard based on the user type
    if ($usertype == 'landlord') {
        $_SESSION['username'] = $username;
        $_SESSION['usertype'] = $usertype;
        $_SESSION['success'] = "You are now logged in";
        header('location: dashboard.php');
    } else {
        $_SESSION['username'] = $username;
        $_SESSION['usertype'] = $usertype;
        $_SESSION['success'] = "You are now logged in";
        header('location: tenant.php');
    }
}
?>
