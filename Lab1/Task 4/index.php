<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 4</title>
    <style>
        body {
            font-size: larger;
        }
    </style>
</head>
<body>
    <h1>Визначення типу символу</h1>

    <?php
    $ukrainianAlphabet = ['а', 'б', 'в', 'г', 'ґ', 'д', 'е', 'є', 'ж', 'з', 'и', 'і', 'ї', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ь', 'ю', 'я'];
    $randomIndex = array_rand($ukrainianAlphabet);
    $character = $ukrainianAlphabet[$randomIndex];

    $character = mb_strtolower($character, 'UTF-8');

    switch ($character) {
        case 'а':
        case 'е':
        case 'и':
        case 'і':
        case 'о':
        case 'у':
        case 'є':
        case 'ю':
        case 'я':
            $result = "голосна";
            break;
        default:
            $result = "приголосна";
            break;
    }

    echo "<p>Символ '$character' є $result</p>";
    ?>
</body>
</html>
