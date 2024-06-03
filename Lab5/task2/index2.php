<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=slim_db;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM tov";
    $result = $pdo->query($sql);
    
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Cost</th>
                <th>Quantity</th>
                <th>Date</th>
            </tr>";
    while ($row = $result->fetch()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['cost']}</td>
                <td>{$row['kol']}</td>
                <td>{$row['date']}</td>
              </tr>";
    }
    echo "</table>";
    
    echo "<form action='insert.php' method='post'>
            <input type='submit' value='Додати запис'>
          </form>
          <form action='delete.php' method='post'>
            <input type='text' name='id' placeholder='№ запису'>
            <input type='submit' value='Вилучити запис'>
          </form>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
