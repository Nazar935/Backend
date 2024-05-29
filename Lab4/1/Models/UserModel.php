<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Model</title>
</head>
<body>
    <?php
        class Color {
            public $name = "Yellow";
            function output_name() {
                echo("output name: " . $this->name);
            }
        }
        $color = new Color();
        $color->output_name();
    ?>
</body>
</html>