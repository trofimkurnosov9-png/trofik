<?php
// Создаем ассоциативный массив с данными преподавателя
$teacher = [
    "Фамилия" => "Лаврецкая",
    "Имя" => "Елизавета",
    "Отчество" => "Викторовна",
    "Логин" => "elizaveta",
    "Пароль" => "12345",
    "Email" => "lovel@mail.ru"
];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Данные преподавателя</title>
</head>
<body>
    <h3>Данные преподавателя</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <?php foreach ($teacher as $key => $value): ?>
            <tr>
                <td><strong><?php echo $key; ?></strong></td>
                <td><?php echo htmlspecialchars($value); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>