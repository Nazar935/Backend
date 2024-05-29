<?php
session_start();
require './database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Output info</title>
    <link rel="stylesheet" href="crossing.css">
</head>

<body>
    <form action="crossing.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <p>Логін:</p>
                </td>
                <td>
                    <?php echo $_POST['login'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Пароль:</p>
                </td>
                <td>
                    <?php echo $answer_password ?>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Стать:</p>
                </td>
                <td>
                    <?php echo $_POST['sex'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Місто:</p>
                </td>
                <td>
                    <?php echo $_POST['cities'] ?>
                </td>
            </tr>
            <tr>
                <td class="up">
                    <p>Улюблені гри:</p>
                </td>
                <td>
                    <?php foreach ($_POST['games'] as $games) {
                        echo $games . "<br>";
                    } ?>
                </td>
            </tr>
            <tr>
                <td class="up">
                    <p>Про себе:</p>
                </td>
                <td>
                    <?php echo $_POST['about-myself'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Фотографія:</p>
                </td>
                <td><img src=""<?php echo $_FILES['photo']['name'] ?>" style="width: 200px; height: 100px;"
                        alt="Завантажене фото"></td>
            </tr>
        </table>
    </form>
    <a href="../index.php">Повернутися на головну сторінку</a>
</body>

</html>