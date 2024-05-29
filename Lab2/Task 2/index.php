<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Task 2</title>
</head>
<body>
    
    <h2>Функція для пошуку елементів масиву, що повторюються</h2>
    <form method="post">
        <label for="array-input">Введіть елементи масиву (через кому):</label><br>
        <input type="text" id="array-input" name="array-input" value="<?php echo isset($_POST['array-input']) ? $_POST['array-input'] : ''; ?>"><br>
        <input type="submit" value="Знайти елементи, що повторюються" name="find-duplicates">
    </form>
    <?php
    if (isset($_POST['find-duplicates'])) {
        $inputArray = explode(',', $_POST['array-input']);
        echo "<p>Елементи масиву, що повторюються:</p>";
        findDuplicates($inputArray);
    }

    
    function findDuplicates($array) {
        $counts = array_count_values($array);
        foreach ($counts as $key => $value) {
            if ($value > 1) {
                echo "Повторюється: $key (зустрічається $value разів)<br>";
            }
        }
    }
    ?>

    
    <h2>Функція для генерації імен тварин</h2>
    <form method="post">
        <label for="animal-parts">Введіть склади для генерації імен тварин (через кому):</label><br>
        <input type="text" id="animal-parts" name="animal-parts" value="<?php echo isset($_POST['animal-parts']) ? $_POST['animal-parts'] : ''; ?>"><br>
        <input type="submit" value="Згенерувати ім'я тварини" name="generate-animal-name">
    </form>
    <?php
    if (isset($_POST['generate-animal-name'])) {
        $animalParts = explode(',', $_POST['animal-parts']);
        echo "<p>Згенероване ім'я тварини: " . generateAnimalName($animalParts) . "</p>";
    }

    
    function generateAnimalName($parts) {
        $animal = '';
        foreach ($parts as $part) {
            $animal .= $part[rand(0, count($part) - 1)];
        }
        return ucfirst($animal);
    }
    ?>

    
    <h2>Функція для з'єднання, видалення повторень та сортування масиву</h2>
    <form method="post">
        <label for="array1-input">Введіть елементи першого масиву (через кому):</label><br>
        <input type="text" id="array1-input" name="array1-input" value="<?php echo isset($_POST['array1-input']) ? $_POST['array1-input'] : ''; ?>"><br>
        <label for="array2-input">Введіть елементи другого масиву (через кому):</label><br>
        <input type="text" id="array2-input" name="array2-input" value="<?php echo isset($_POST['array2-input']) ? $_POST['array2-input'] : ''; ?>"><br>
        <input type="submit" value="Обробити масиви" name="manipulate-arrays">
    </form>
    <?php
    if (isset($_POST['manipulate-arrays'])) {
        $array1 = explode(',', $_POST['array1-input']);
        $array2 = explode(',', $_POST['array2-input']);
        $resultArray = manipulateArrays($array1, $array2);
        echo "<p>Результат обробки масивів:</p>";
        echo "<pre>";
        print_r($resultArray);
        echo "</pre>";
    }

    
    function manipulateArrays($array1, $array2) {
        $combinedArray = array_merge($array1, $array2);
        $uniqueArray = array_unique($combinedArray);
        sort($uniqueArray);
        return $uniqueArray;
    }
    ?>

    
    <h2>Сортування масиву користувачів</h2>
    <form method="post">
        <label for="users-input">Введіть дані користувачів у форматі ім'я:вік (через кому):</label><br>
        <input type="text" id="users-input" name="users-input" value="<?php echo isset($_POST['users-input']) ? $_POST['users-input'] : ''; ?>"><br>
        <label for="sort-by">Сортувати за:</label>
        <select name="sort-by" id="sort-by">
            <option value="name">Ім'ям</option>
            <option value="age">Віком</option>
        </select><br>
        <input type="submit" value="Сортувати масив" name="sort-users">
    </form>
    <?php
    if (isset($_POST['sort-users'])) {
        $usersInput = explode(',', $_POST['users-input']);
        $users = [];
        foreach ($usersInput as $user) {
            list($name, $age) = explode(':', $user);
            $users[$name] = $age;
        }
        $sortBy = $_POST['sort-by'];
        echo "<p>Відсортований масив користувачів:</p>";
        echo "<pre>";
        print_r(sortUsers($users, $sortBy));
        echo "</pre>";
    }

    
    function sortUsers($users, $sortBy) {
        if ($sortBy == 'age') {
            asort($users);
        } elseif ($sortBy == 'name') {
            ksort($users);
        }
        return $users;
    }
    ?>
</body>
</html>
