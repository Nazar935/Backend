<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 3</title>
    <style>
        body {
            font-size: larger;
        }
    </style>
</head>
<body>
    <h1>Визначення сезону за номером місяця</h1>
    
    <?php
    $month = 5;

    if ($month >= 3 && $month <= 5) {
        $season = "весна";
    } elseif ($month >= 6 && $month <= 8) {
        $season = "літо";
    } elseif ($month >= 9 && $month <= 11) {
        $season = "осінь";
    } else {
        $season = "зима";
    }

    echo "<p>Місяць з номером $month належить до сезону: $season</p>";
    ?>
</body>
</html>
