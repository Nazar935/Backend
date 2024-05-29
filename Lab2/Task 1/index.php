<?php
session_start();


if(isset($_POST['result-replace'])) {

    $text = $_POST['text'];
    $find = $_POST['find'];
    $replace = $_POST['replace'];
    
    
    $result = str_replace($find, $replace, $text);

    
    $_SESSION['result-replace'] = $result;
}


if(isset($_POST['result-cities'])) {
    
    $cities = explode(" ", $_POST['cities']);
    sort($cities);
    $result = implode(", ", $cities);

    
    $_SESSION['result-cities'] = $result;
}


if(isset($_POST['result-file'])) {
    
    $filePath = $_POST['file-path'];
    $fileName = pathinfo($filePath, PATHINFO_FILENAME);

    
    $_SESSION['result-file'] = $fileName;
}


if(isset($_POST['result-dates'])) {
    
    $firstDate = DateTime::createFromFormat('d-m-Y', $_POST['first-date']);
    $secondDate = DateTime::createFromFormat('d-m-Y', $_POST['second-date']);
    $interval = $firstDate->diff($secondDate);
    $days = $interval->days;

    
    $_SESSION['result-dates'] = $days;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1</title>
</head>
<body>
    
    <form method="post" action="">
        <table>
            <tr>
                <td><label for="text">Текст:</label></td>
                <td>
                    <input type="text" name="text" id="text" value="<?php echo isset($_POST['text']) ? $_POST['text'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <td><label for="find">Знайти:</label></td>
                <td>
                    <input type="text" name="find" id="find" value="<?php echo isset($_POST['find']) ? $_POST['find'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <td><label for="replace">Замінити:</label></td>
                <td><input type="text" name="replace" id="replace" value="<?php echo isset($_POST['replace']) ? $_POST['replace'] : ''; ?>"></td>
            </tr>
            <tr>
                <td><label for="result-replace">Результат:</label></td>
                <td><input type="submit" name="result-replace" value="Результат" id="result-replace"></td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_POST['result-replace'])) {
        echo "<p>Результат: {$_SESSION['result-replace']}</p>";
    }
    ?>

    
    <form method="post" action="">
        <table>
            <tr>
                <td><label for="cities">Введіть назви міст через пробіл:</label></td>
                <td><input type="text" name="cities" id="cities" value="<?php echo isset($_POST['cities']) ? $_POST['cities'] : ''; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="result-cities" value="Результат"></td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_POST['result-cities'])) {
        echo "<p>Впорядковані міста: {$_SESSION['result-cities']}</p>";
    }
    ?>


    <form action="" method="post">
        <table>
            <tr>
                <td><label for="file-path">Введіть шлях до файлу:</label></td>
                <td><input type="text" name="file-path" id="file-path" value="<?php echo isset($_POST['file-path']) ? $_POST['file-path'] : ''; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Результат" name="result-file"></td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_POST['result-file'])) {
        echo "<p>Ім'я файлу без розширення: {$_SESSION['result-file']}</p>";
    }
    ?>

    
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="first-date">Перша дата (дд-мм-рррр):</label></td>
                <td><input type="text" name="first-date" id="first-date" value="<?php echo isset($_POST['first-date']) ? $_POST['first-date'] : ''; ?>"></td>
            </tr>
            <tr>
                <td><label for="second-date">Друга дата (дд-мм-рррр):</label></td>
                <td><input type="text" name="second-date" id="second-date" value="<?php echo isset($_POST['second-date']) ? $_POST['second-date'] : ''; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Результат" name="result-dates"></td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_POST['result-dates'])) {
        echo "<p>Кількість днів між датами: {$_SESSION['result-dates']}</p>";
    }
    ?>

    
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="password-length">Довжина пароля:</label></td>
                <td><input type="text" name="password-length" id="password-length" value="<?php echo isset($_POST['password-length']) ? $_POST['password-length'] : ''; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Генерувати" name="generate-password"></td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_POST['generate-password'])) {
        $length = $_POST['password-length'];
        $password = generatePassword($length);
        echo "<p>Згенерований пароль: $password</p>";
    }

    function generatePassword($length) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+{}|:<>?-=[];,./';
        $password = '';
        $charsLength = strlen($chars);
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[rand(0, $charsLength - 1)];
        }
        return $password;
    }
    ?>

    
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="user-password">Введіть пароль:</label></td>
                <td><input type="password" name="user-password" id="user-password" value="<?php echo isset($_POST['user-password']) ? $_POST['user-password'] : ''; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Перевірити" name="check-password"></td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_POST['check-password'])) {
        $password = $_POST['user-password'];
        if(checkPasswordStrength($password)) {
            echo "<p>Пароль достатньо міцний.</p>";
        } else {
            echo "<p>Пароль недостатньо міцний.</p>";
        }
    }

    function checkPasswordStrength($password) {
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
        return preg_match($pattern, $password);
    }
    ?>
</body>
</html>
