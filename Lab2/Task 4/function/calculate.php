<?php
require './func.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculate</title>
    <link rel="stylesheet" href="calculate.css">
</head>

<body>
    <table>
        <tr>
            <td>x<sup>y</sup></td>
            <td>x!</td>
            <td>my_tg(x)</td>
            <td>sin(x)</td>
            <td>cos(x)</td>
            <td>tg(x)</td>
        </tr>
        <tr>
            <td><?php echo power($x, $y); ?></td>
            <td><?php echo factorial($x); ?></td>
            <td><?php echo myTG($x); ?></td>
            <td><?php echo funcSin($x); ?></td>
            <td><?php echo funcCos($x); ?></td>
            <td><?php echo tg($x); ?></td>
        </tr>
    </table>
</body>

</html>