<?php
$dsn = 'mysql:host=localhost;dbname=company_db;charset=utf8';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];

        $sql = 'UPDATE employees SET name = ?, position = ?, salary = ? WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $position, $salary, $id]);

        header('Location: index.php');
        exit();
    } else {
        $id = $_GET['id'];
        $sql = 'SELECT * FROM employees WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $employee = $stmt->fetch(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
</head>
<body>
    <h2>Edit Employee</h2>
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($employee['id']) ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($employee['name']) ?>"><br>
        <label for="position">Position:</label>
        <input type="text" id="position" name="position" value="<?= htmlspecialchars($employee['position']) ?>"><br>
        <label for="salary">Salary:</label>
        <input type="text" id="salary" name="salary" value="<?= htmlspecialchars($employee['salary']) ?>"><br>
        <input type="submit" value="Update Employee">
    </form>
</body>
</html>
