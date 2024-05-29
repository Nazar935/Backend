<?php
session_start();

// Перевірка, чи встановлено значення мови через GET-запит та збереження мови в куках
if (isset($_GET['lang']) && ($_GET['lang'] === 'ukr' || $_GET['lang'] === 'eng')) {
    $language = $_GET['lang'] ?? '';
    saveLanguageCookie($language);
}

// Функція для збереження обраної мови в куках
function saveLanguageCookie($language) {
    $expiry_time = time() + (180 * 24 * 60 * 60); // Півроку
    setcookie('language', $language, $expiry_time);
}

// Вибір мови з куки або встановлення за замовчуванням
if (isset($_COOKIE['language'])) {
    $selected_language = $_COOKIE['language'];
} else {
    $selected_language = 'Мова не вибрана';
}

// Видалення збережених даних з сесії при першому завантаженні сторінки
if (!isset($_SESSION['formData'])) {
    unset($_SESSION['formData']);
}

// Збереження даних з форми в сесію
if (isset($_POST['result-page'])) {
    $_SESSION['formData'] = $_POST;
    unset($_SESSION['formData']['result-page']); // Видалення кнопки з масиву даних
}

?>

<!DOCTYPE html>
<html lang="ua">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Реєстрація</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="./next-page/crossing.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="login">Логін:</label></td>
                <td><input type="text" name="login" id="login" value="<?php echo $_SESSION['formData']['login'] ?? ''; ?>"></td>
            </tr>
            <tr>
                <td><label for="password">Пароль:</label></td>
                <td><input type="password" name="password" id="password"
                        value="<?php echo $_SESSION['formData']['password'] ?? ''; ?>"></td>
            </tr>
            <tr>
                <td><label for="password-repeat">Пароль (ще раз):</label></td>
                <td><input type="password" name="password-repeat" id="password-repeat"
                        value="<?php echo $_SESSION['formData']['password-repeat'] ?? ''; ?>"></td>
            </tr>
            <tr>
                <td><label for="male">Стать:</label></td>
                <td>
                    <input type="radio" name="sex" id="male" value="male" <?php echo ($_SESSION['formData']['sex'] ?? '') === 'male' ? 'checked' : ''; ?>>
                    <label for="male">чоловік</label>

                    <input type="radio" name="sex" id="female" value="female" <?php echo ($_SESSION['formData']['sex'] ?? '') === 'female' ? 'checked' : ''; ?>>
                    <label for="female">жінка</label>
                </td>
            </tr>
            <tr>
                <td><label for="city">Місто:</label></td>
                <td>
                    <select name="cities" id="city">
                        <option value="Житомир" <?php echo ($_SESSION['formData']['cities'] ?? '') === 'Житомир' ? 'selected' : ''; ?>>Житомир</option>
                        <option value="Київ" <?php echo ($_SESSION['formData']['cities'] ?? '') === 'Київ' ? 'selected' : ''; ?>>Київ
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="favorite-games">
                    <p>Улюблені гри:</p>
                </td>
                <td>
                    <div class="games">
                        <input type="checkbox" name="games[]" id="football" value="Футбол" <?php echo (isset($_SESSION['formData']['games']) && in_array('футбол', $_SESSION['formData']['games'])) ? 'checked' : ''; ?>>
                        <label for="football">Футбол</label>
                    </div>

                    <div class="games">
                        <input type="checkbox" name="games[]" id="basketball" value="Баскетбол" <?php echo (isset($_SESSION['formData']['games']) && in_array('баскетбол', $_SESSION['formData']['games'])) ? 'checked' : ''; ?>>
                        <label for="basketball">Баскетбол</label>
                    </div>

                    <div class="games">
                        <input type="checkbox" name="games[]" id="volleyball" value="Волейбол" <?php echo (isset($_SESSION['formData']['games']) && in_array('волейбол', $_SESSION['formData']['games'])) ? 'checked' : ''; ?>>
                        <label for="volleyball">Волейбол</label>
                    </div>

                    
                </td>
            </tr>
            <tr>
                <td><label for="about-myself">Про себе:</label></td>
                <td><textarea name="about-myself" id="about-myself" cols="20"
                        rows="5"><?php echo $_SESSION['formData']['about-myself'] ?? ''; ?></textarea></td>
            </tr>
            <tr>
                <td><label for="photo">Фотографія:</label></td>
                <td><input type="file" name="photo" id="photo"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Зареєструватися" name="result-page"></td>
            </tr>
        </table>
    </form>
    <div class="countries">
    <a href="index.php?lang=ua" style="display: inline-block; text-decoration: none;">
    <img src="./countries flag/Ua.jpg" alt="Ukraine" style="width: 24px; vertical-align: middle;">
    <span style="margin-left: 5px;">Ukraine</span>
</a>
<a href="index.php?lang=cz" style="display: inline-block; text-decoration: none;">
    <img src="./countries flag/Uk.jpg" alt="Britain" style="width: 24px; vertical-align: middle;">
    <span style="margin-left: 5px;">Britain</span>
</a>
        <a href="index.php?lang=cz" style="display: inline-block; text-decoration: none;">
    <img src="./countries flag/Cz.jpg" alt="Czechia" style="width: 24px; vertical-align: middle;">
    <span style="margin-left: 5px;">Czechia</span>
</a>
    </div>
    <?php echo "Вибрана мова: $selected_language"; ?>
</body>

</html>
