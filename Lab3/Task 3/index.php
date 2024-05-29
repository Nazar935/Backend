<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 3</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form method="post">
        <label for="">Name:</label><br>
        <input type="text" id="Name" name="Name" value=""><br>

        <label for="Comment">Comment:</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Send">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            file_put_contents("myfile.txt", "");
            $f = fopen("myfile.txt", "a");
            fwrite($f, $_POST['comment']);
            fclose($f);
        }
        if(file_exists("myfile.txt")) {
            $file = fopen("myfile.txt", "r");

            echo "<table>";
            while(!feof($file)) {
                echo "<tr><td>" . fgets($file) . "</td></tr>";
            }
            echo "</table>";
            fclose($file);
        }
        $text = ["apple", "cat", "orange", "shape"];

        

        $f_line = explode(' ', trim(file_get_contents("First.txt")));
        $s_line = explode(' ', trim(file_get_contents("Second.txt")));

        echo "1. lines that occur only in the first file.<br>";
        foreach ($f_line as $i) {
            if (!in_array($i, $s_line)) {
                echo $i . " ";
            }
        }
        echo "<br><br>2. lines that occur both files.<br>";
        foreach ($f_line as $i) {
            if (in_array($i, $s_line)) {
                echo $i . " ";
            }
        }
        echo "<br><br>3.1 lines that count number is bigger than 2<br>";
        for($i = 0; $i < count($f_line); $i++) {
            $index = 0;
            $value = $f_line[$i];
            for($j = $i; $j < count($f_line); $j++) {
                if($f_line[$j] == $value){
                    $index++;
                }
            }
            if($index > 2){
                echo "Count of '$value' is 2 and more";
            }
        }
        $text = explode(' ', trim(file_get_contents("text.txt")));
        echo "<br><br>Usual text: " . file_get_contents("text.txt") . "<br>";
        natcasesort($text);
        echo "Sorted: ";
        foreach ($text as $value) {
            echo $value . " ";
        }
    ?>
    
</body>
</html>