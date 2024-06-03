<?php
$dsn = 'mysql:host=localhost;dbname=company_db;charset=utf8';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Середня заробітна плата
    $sql = 'SELECT AVG(salary) AS avg_salary FROM employees';
    $stmt = $pdo->query($sql);
    $avg_salary = $stmt->fetch(PDO::FETCH_ASSOC)['avg_salary'];

    // Кількість працівників на кожній посаді
    $sql = 'SELECT position, COUNT(*) AS count FROM employees GROUP BY position';
    $stmt = $pdo->query($sql);
    $position_counts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Statistics</title>
</head>
<body>
    <h2>Statistics</h2>
    <p>Average Salary: <?= htmlspecialchars($avg_salary) ?></p>
    <h3>Employees by Position</h3>
    <ul>
        <?php foreach ($position_counts as $position_count): ?>
        <li><?= htmlspecialchars($position_count['position']) ?>: <?= htmlspecialchars($position_count['count']) ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php">Back to Employee List</a>
</body>
</html>

