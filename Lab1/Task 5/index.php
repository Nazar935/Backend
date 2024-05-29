<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 5</title>
    <style>
        body {
            font-size: larger;
        }
    </style>
</head>
<body>

    <?php
    $number = mt_rand(100, 999);
    $sum = array_sum(str_split($number));
    $reversedNumber = strrev($number);
    $sortedDigits = str_split($number);
    rsort($sortedDigits);
    $maxNumber = implode('', $sortedDigits);

    echo "<p>Випадкове тризначне число: $number</p>";
    echo "<p>1. Сума його цифр: $sum</p>";
    echo "<p>2. Число в зворотному порядку: $reversedNumber</p>";
    echo "<p>3. Найбільше можливе число: $maxNumber</p>";
    ?>
</body>
</html>
