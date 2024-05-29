<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 5</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label for="Login">Логин</label>
        <input type="text" name="Login" id="Login">

        <label for="Password">Пароль</label>
        <input type="text" name="Password" id="Password">

        <input type="submit" value="Add" name="submit">
    </form>
    <?php
        $target_dir = "C:/Users/sanic/Desktop/Політех/Back-end розробка/Lab_3/5";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!is_dir($_POST["Login"])) {
                if (mkdir($_POST["Login"], 0755)) {
                    echo "Папка успішно створена : " . $_POST["Login"];
                    mkdir($_POST["Login"]."/Video", 0755);
                    mkdir($_POST["Login"]."/Music", 0755);
                    mkdir($_POST["Login"]."/Photo", 0755);
                } 
                else {
                    echo "Не вийшло створити папку: " . $_POST["Login"];
                }
            } 
            else {
                echo "Папка вже існує: " . $_POST["Login"];
            }
        }
    ?>

</body>
</html>