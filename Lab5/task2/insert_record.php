<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=slim_db;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $name = $_POST['name'];
    $cost = $_POST['cost'];
    $kol = $_POST['kol'];
    $date = $_POST['date'];
    
    $sql = "INSERT INTO tov (name, cost, kol, date) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $cost, $kol, $date]);
    
    echo "New record created successfully";
    echo "<br><a href='index.php'>Go back</a>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
