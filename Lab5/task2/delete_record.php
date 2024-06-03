<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=slim_db;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $id = $_POST['id'];
    
    $sql = "DELETE FROM tov WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    
    echo "Record deleted successfully";
    echo "<br><a href='index.php'>Go back</a>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
