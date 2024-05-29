<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 6 </title>
    <style>
        .color-table td {
            width: 30px;
            height: 30px;
            border: 1px solid black;
        }
        .red-square {
            background-color: red;
            width: 50px;
            height: 50px;
            margin: 2px;
            float: left;
        }
        .black-background {
            background-color: black;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <h2>Color Table</h2>
    <?php
    function generateColorTable($rows, $cols) {
        echo "<table class='color-table'>";
        for ($i = 0; $i < $rows; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $cols; $j++) {
                $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                echo "<td style='background-color: $color'></td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    generateColorTable(5, 5);
    ?>
    <h2>Random Squares</h2>
    <?php
    function generateRandomSquares($n) {
        echo "<div class='black-background'>";
        for ($i = 0; $i < $n; $i++) {
            echo "<div class='red-square'></div>";
        }
        echo "</div>";
    }

    generateRandomSquares(5);
    ?>
</body>
</html>
