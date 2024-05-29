<?php
        if(isset($_GET['action'])) {
            $action = $_GET['action'];
            
            if($action == 'Large')
                setcookie("fontSize", "Large", time() + (60 * 60));
            else if($action == 'Medium')
                setcookie("fontSize", "Medium", time() + (60 * 60));
            else if($action == 'Small')
                setcookie("fontSize", "Small", time() + (60 * 60));
            
            echo "<script>window.location.href = 'index.php';</script>";
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1</title>
</head>
<body>
    <div>
        <a href="index.php?action=Large">Large</a><br>
        <a href="index.php?action=Medium">Medium</a><br>
        <a href="index.php?action=Small">Small</a><br>
    </div>

    <?php
        if(isset($_COOKIE["fontSize"])){
            if($_COOKIE["fontSize"] == "Large")
                echo "<h1>Text Example</h1>";
            else if($_COOKIE["fontSize"] == "Medium")
                echo "<h3>Text Example</h3>";
            else if($_COOKIE["fontSize"] == "Small")
                echo "<h5>Text Example</h5>";
        }
    ?>
</body>
</html>