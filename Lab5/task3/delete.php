<?php
$dsn = 'mysql:host=localhost;dbname=company_db;charset=utf8';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = 'DELETE FROM employees WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        header('Location: index.php');
        exit();
    }
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}
?>
