<?php
$dsn = 'mysql:host=localhost;dbname=company_db;charset=utf8';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM employees';
    $stmt = $pdo->query($sql);
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees</title>
</head>
<body>
    <h2>Employees</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($employees as $employee): ?>
        <tr>
            <td><?= htmlspecialchars($employee['id']) ?></td>
            <td><?= htmlspecialchars($employee['name']) ?></td>
            <td><?= htmlspecialchars($employee['position']) ?></td>
            <td><?= htmlspecialchars($employee['salary']) ?></td>
            <td>
                <a href="edit.php?id=<?= $employee['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $employee['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <h2>Add New Employee</h2>
    <form action="insert.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br>
        <label for="position">Position:</label>
        <input type="text" id="position" name="position"><br>
        <label for="salary">Salary:</label>
        <input type="text" id="salary" name="salary"><br>
        <input type="submit" value="Add Employee">
    </form>
</body>
</html>
