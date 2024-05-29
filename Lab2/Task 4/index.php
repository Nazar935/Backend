<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 4</title>
    <style>
        
        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <form action="./function/calculate.php" method="post">
        <table>
            <tr>
                <td><label for="x">x</label></td>
                <td><label for="y">y</label></td>
            </tr>
            <tr>
                <td><input type="text" name="x" id="x"></td>
                <td><input type="text" name="y" id="y"></td>
                <td><input type="submit" value="=" name="equal" style="width: 100px;"></td>
            </tr>
        </table>
    </form>
</body>

</html>
