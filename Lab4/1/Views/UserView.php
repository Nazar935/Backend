<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>
    <?php
        class Animal {
            public $name;
            function output_name() {
                echo("Animal name: " . $this->name);
            }
        }
        $animal = new Animal();

        $animal->name = "Wolf";

        $animal->output_name();
    ?>
</body>
</html>