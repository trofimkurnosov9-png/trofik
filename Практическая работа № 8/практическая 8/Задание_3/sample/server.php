<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Доступ ограничен. Скрипт должен запускаться только как обработчик формы.');
}

$firstname = htmlspecialchars($_POST['firstname'] ?? 'Не указано');
$lastname  = htmlspecialchars($_POST['lastname'] ?? 'Не указано');
$email     = htmlspecialchars($_POST['email'] ?? 'Не указано');

$avatar_src = 'images/no-photo.jpg'; 
if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    
    if (!is_dir('images')) {
        mkdir('images', 0777, true);
    }
    
    $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $new_filename = 'user_' . uniqid() . '.' . $ext;
    $destination = 'images/' . $new_filename;
    
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $destination)) {
        $avatar_src = $destination; 
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Профиль пользователя</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f9f9f9; }
        .profile-card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); max-width: 400px; }
        .avatar { width: 150px; height: 150px; object-fit: cover; border-radius: 50%; border: 3px solid #ccc; margin-bottom: 15px; }
        .info { font-size: 16px; margin-bottom: 8px; }
        .label { font-weight: bold; color: #555; }
    </style>
</head>
<body>

    <h1>Данные пользователя приняты</h1>

    <div class="profile-card">
        <img src="<?= $avatar_src ?>" alt="Аватар пользователя" class="avatar">
        <div class="info"><span class="label">Имя:</span> <?= $firstname ?></div>
        <div class="info"><span class="label">Фамилия:</span> <?= $lastname ?></div>
        <div class="info"><span class="label">Email:</span> <?= $email ?></div>
    </div>

</body>
</html>

</body>
</html>