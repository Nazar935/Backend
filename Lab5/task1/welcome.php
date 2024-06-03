<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome <?php echo $_SESSION['username']; ?></h2>
    <a href="edit_profile.php">Edit Profile</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>
