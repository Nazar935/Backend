<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 4</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
        <input type="submit" value="Upload Image" name="submit">
    </form>
    <?php
    $target_dir = "C:/Users/sanic/Desktop/Політех/Back-end розробка/Lab_3/4/uploads";
    $img_dir = "C:/Users/sanic/Desktop/Політех/Back-end розробка/Lab_3/4/img";

    echo $target_dir . "<br>";
    echo "Dir -------: " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

    if (isset($_POST["submit"])) {
        if ($_FILES["fileToUpload"]["error"] === UPLOAD_ERR_OK) {
            $uploadFile = $_FILES["fileToUpload"]["tmp_name"]; 
            $targetFile = $target_dir . "/" . basename($_FILES["fileToUpload"]["name"]); 
            if (move_uploaded_file($uploadFile, $targetFile)) {
                echo "Файл " . $target_dir . " успішно завантажено.";
            } 
            else {
                echo "Виникла помилка під час завантаження файлу. ";
            }
        } else {
            echo "Сталася помилка під час завантаження файлу: " . $_FILES["fileToUpload"]["error"];
        }
    }
    ?>

</body>
</html>