<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller</title>
</head>
<body>
    <?php
        class Fruit {
            public $name;

            function set_name($name) {
                $this->name = $name;
            }
            function get_name() {
                return $this->name;
            }
        }
        $apple = new Fruit();

        $apple->set_name('Apple');

        echo "Value from object -> " . $apple->get_name();
    ?>
</body>
</html>