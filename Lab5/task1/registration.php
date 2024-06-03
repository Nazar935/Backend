<?php
session_start();
include('config.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    // Перевірка наявності користувача з таким же іменем або email
    $query = "SELECT id FROM users WHERE username='$username' OR email='$email'";
    $result = mysqli_query($link, $query);
    $count = mysqli_num_rows($result);

    if($count == 0) {
        // Додавання користувача до бази даних
        $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        mysqli_query($link, $query);
        header("location: index.php");
        exit();
    } else {
        echo "Username or Email already exists.";
    }
}
?>
