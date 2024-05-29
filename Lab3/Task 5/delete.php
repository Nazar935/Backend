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

        <input type="submit" value="delete" name="submit">
    </form>
    <?php
        function removeDirectory($dir) {  
            $d = opendir($dir);  
            while(($entry = readdir($d)) !== false) { 
                if ($entry != "." && $entry != "..") { 
                    if (is_dir($dir . "/" . $entry)) {  
                        removeDirectory($dir . "/" . $entry);  
                    } else {  
                        unlink ($dir . "/" . $entry);  
                    } 
                } 
            } 
            closedir($d);  
            rmdir ($dir);  
        } 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (is_dir($_POST["Login"])) {
                    echo "Папка видалена: " . $_POST["Login"];
                    removeDirectory($_POST["Login"]);
            } 
            else {
                echo "Немає токої  папки: " . $_POST["Login"];
            }
        }
    ?>

</body>
</html>