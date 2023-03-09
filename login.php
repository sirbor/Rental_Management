<?php
session_start();
include('config.php');

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $usertype = mysqli_real_escape_string($conn, $_POST['usertype']);

    $query = "SELECT * FROM User WHERE username='$username' AND password='$password' AND usertype='{$_POST['usertype']}'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['usertype'] = $_POST['usertype'];
        $_SESSION['success'] = "You are now logged in";

        if ($_POST['usertype'] == 'landlord') {
            header('location: dashboard.php');
        } else if ($_POST['usertype'] == 'tenant') {
            header('location: tenant.php');
        }
    } else {
        $_SESSION['error'] = "Invalid username or password";
        header('location: index.php');
        exit();
    }
}
?>