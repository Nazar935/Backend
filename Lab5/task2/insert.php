<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>
    <h2>Insert New Record</h2>
    <form action="insert_record.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="cost">Cost:</label><br>
        <input type="text" id="cost" name="cost"><br>
        <label for="kol">Quantity:</label><br>
        <input type="text" id="kol" name="kol"><br>
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
