<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
</head>
<body>

    <h1>Отправка данных на сервер</h1>
    <h2>Безопасность данных, часть 1</h2>

    <?php
        // Инициализация массива для ошибок
        $errors = [];

        // Получение данных из POST
        $login = trim($_POST['login'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $pwd   = trim($_POST['pwd'] ?? '');

        // ---- 1. Проверка поля Логин ----
        if ($login === '') {
            $errors[] = "Не заполнено поле Логин";
        } else {
            // Санитизация (удаляем пробелы и спецсимволы HTML)
            $login_sanitized = htmlspecialchars($login, ENT_QUOTES, 'UTF-8');
            // Валидация: только буквы, цифры, дефис, подчёркивание, точка (пример)
            if (!preg_match('/^[a-zA-Z0-9_.-]+$/', $login_sanitized)) {
                $errors[] = "Логин содержит недопустимые символы";
            }
        }

        // ---- 2. Проверка поля E-mail ----
        if ($email === '') {
            $errors[] = "Не заполнено поле E-mail";
        } else {
            // Санитизация email
            $email_sanitized = filter_var($email, FILTER_SANITIZE_EMAIL);
            // Валидация email
            if (!filter_var($email_sanitized, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "$email_sanitized - невалидный адрес";
            }
        }

        // ---- 3. Проверка поля Пароль ----
        if ($pwd === '') {
            $errors[] = "Не заполнено поле Пароль";
        } else {
            // Санитизация пароля (удаляем HTML теги)
            $pwd_sanitized = htmlspecialchars($pwd, ENT_QUOTES, 'UTF-8');
            // Валидация: минимум 4 символа, буквы/цифры
            if (strlen($pwd_sanitized) < 4) {
                $errors[] = "Пароль должен содержать минимум 4 символа";
            }
        }

        // ---- Вывод результата ----
        if (empty($errors)) {
            echo "<p style='color:green;'>Форма успешно отправлена!</p>";
        } else {
            // Выводим массив ошибок в формате, похожем на пример из задания
            echo "<pre>";
            var_dump($errors);
            echo "</pre>";
        }
    ?>

</body>
</html>