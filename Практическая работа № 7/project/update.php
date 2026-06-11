<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'bd.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$user = null;
$success_message = '';
$error_message = '';

// Получаем данные пользователя
if ($id > 0) {
    $sql = "SELECT id, name, login, email FROM users WHERE id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
}

// Обработчик обновления
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    $name = trim($_POST['name'] ?? '');
    $login = trim($_POST['login'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if ($id > 0 && !empty($name) && !empty($login) && !empty($email)) {
        
        if (!empty($password)) {
            // Обновление с паролем
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET name = ?, login = ?, email = ?, password = ? WHERE id = ?";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("ssssi", $name, $login, $email, $hashed_password, $id);
        } else {
            // Обновление без пароля
            $sql = "UPDATE users SET name = ?, login = ?, email = ? WHERE id = ?";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("sssi", $name, $login, $email, $id);
        }
        
        if ($stmt->execute()) {
            $success_message = "Данные пользователя успешно обновлены!";
            // Обновляем данные для формы
            $user = ['id' => $id, 'name' => $name, 'login' => $login, 'email' => $email];
        } else {
            $error_message = "Ошибка обновления: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $error_message = "Заполните все обязательные поля!";
    }
}
?>

<?php include 'header.php'; ?>

<section style="min-height: 80vh;" class="d-flex align-items-center">
    <div class="container py-3">
        <div class="w-50 mx-auto">
            <h2 class="text-center mb-4">Редактирование пользователя</h2>
            
            <?php if ($success_message): ?>
                <div class="alert alert-success"><?php echo $success_message; ?></div>
            <?php endif; ?>
            
            <?php if ($error_message): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>
            
            <?php if ($user): ?>
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control rounded-pill shadow-sm px-3" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" class="form-control rounded-pill shadow-sm px-3" id="login" name="login" value="<?php echo htmlspecialchars($user['login']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control rounded-pill shadow-sm px-3" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Новый пароль (оставьте пустым, если не хотите менять)</label>
                    <input type="password" class="form-control rounded-pill shadow-sm px-3" id="password" name="password">
                </div>
                
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-grow-1 rounded-pill py-2">Сохранить изменения</button>
                    <a href="admin.php" class="btn btn-secondary flex-grow-1 rounded-pill py-2 text-center">Вернуться</a>
                </div>
            </form>
            <?php else: ?>
                <div class="alert alert-danger text-center">
                    Пользователь не найден!
                    <br><br>
                    <a href="admin.php" class="btn btn-primary">Вернуться к таблице</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>