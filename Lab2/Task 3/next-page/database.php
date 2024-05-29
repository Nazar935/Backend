<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['result-page'])) {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['password-repeat'] = $_POST['password-repeat'];

    $answer_password = checkPassword($_POST['password'], $_POST['password-repeat']);

    $_SESSION['sex'] = $_POST['sex'];
    $_SESSION['cities'] = $_POST['cities'];
    $_SESSION['games'] = $_POST['games'];
    $_SESSION['about-myself'] = $_POST['about-myself'];

    $upload_dir = "../photo/";
    move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $_FILES['photo']['name']);
}

function checkPassword($password, $password_repeat) : string {
    if ($password === $password_repeat) {
        return "Пароль вірний";
    } else {
        return "Пароль не вірний";
    }
}