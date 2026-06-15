<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['loader'])) {
    die('Доступ ограничен. Скрипт должен запускаться только как обработчик формы.');
}

$name = htmlspecialchars($_POST['name'] ?? '');
$alias = htmlspecialchars($_POST['alias'] ?? '');
$country = htmlspecialchars($_POST['country'] ?? '');
$style = htmlspecialchars($_POST['style'] ?? '');
$content = htmlspecialchars($_POST['content'] ?? '');
$file_uploaded = isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE;

if ($file_uploaded && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    if (!is_dir('images')) {
        mkdir('images', 0777, true);}
    
    $destination = 'images/' . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $destination);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обработчик формы</title>
</head>
<body>

    <h1>Скрипт-обработчик формы</h1>
    
    <h2>На сервере приняты данные формы</h2>
    <p><i>Название группы:</i> <b><?= $name ?></b>,</p>
    <p><i>Алиасное имя:</i> <b><?= $alias ?></b>,</p>
    <p><i>Страна:</i> <b><?= $country ?></b>,</p>
    <p><i>Стиль:</i> <b><?= $style ?></b>,</p>
    <p><i>Контент:</i> <b><?= $content ?></b></p>

    <?php if ($file_uploaded): ?>
        <h2>Пользователь пытается загрузить файл</h2>
        <p><i>Имя файла:</i> <b><?= htmlspecialchars($_FILES['image']['name']) ?></b>,</p>
        <p><i>Размер файла:</i> <b><?= $_FILES['image']['size'] ?></b> байт,</p>
        <p><i>Тип содержимого файла:</i> <b><?= htmlspecialchars($_FILES['image']['type']) ?></b>,</p>
        <p><i>Имя временного файла:</i> <b><?= htmlspecialchars($_FILES['image']['tmp_name']) ?></b>,</p>
        <p><i>Код ошибки:</i> <b><?= $_FILES['image']['error'] ?></b>.</p>
    <?php endif; ?>

</body>
</html>
