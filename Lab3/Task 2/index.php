<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 2</title>
</head>
<body>
    <?php
    function Form(){
    ?>
    <form method="post">
        <label for="">Логін:</label><br>
        <input type="text" id="Login" name="Login" value=""><br>

        <label for="Password">Пароль:</label><br>
        <input type="text" id="Password" name="Password" value=""><br><br>

        <input type="submit" value="Зареєструватися">
    </form>
    <?php
    }
    ?>

    <?php
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $_SESSION["Login"] = $_POST['Login'];
            $_SESSION["Password"] = $_POST['Password'];
            if(isset($_SESSION['Login']) && isset($_SESSION['Password']) && $_SESSION['Login'] == "Admin" && $_SESSION['Password'] == "password"){
                echo("<p style='color:green; font-weight: bold;'>Добрий день, Admin!</p>");
                echo "<form method='post'><input type='submit' name='logout' value='Выйти'></form>";
                exit;
            }else{
                echo("<p style='color:red;'>Логін і пароль невірні!</p>");
            }
        }
        if(isset($_POST['logout'])) {
            Form();
            session_destroy();
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        }else{
            Form();
        }
    ?>
</body>
</html>