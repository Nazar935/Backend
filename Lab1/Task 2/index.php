<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 2</title>
    <style>
        body {
            font-size: xx-large;
        }
    </style>
</head>
<body>
    <?php
    echo "<h1>Конвертація валют</h1>";

    $currentDollarRate = 38.70;

    $amountInHryvnias = rand(1000, 2000);
    echo "Сума гривень (1000-2000) = ".$amountInHryvnias."<br>";

    echo "Один долар в гривнях = ".$currentDollarRate."<br>";

    $amountInDollars = sprintf('%.2f', $amountInHryvnias / $currentDollarRate);
    echo $amountInHryvnias." грн. можна обміняти на ".$amountInDollars." долар<br>";
    ?>
</body>
</html>
