<?php
$dsn = 'mysql:host=localhost;dbname=company_db;charset=utf8';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];

        $sql = 'INSERT INTO employees (name, position, salary) VALUES (?, ?, ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $position, $salary]);

        header('Location: index.php');
        exit();
    }
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}
?>
