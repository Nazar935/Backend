<?php
session_start();
include('config.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "SELECT id FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($link, $query);
    $count = mysqli_num_rows($result);

    if($count == 1) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: welcome.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>
