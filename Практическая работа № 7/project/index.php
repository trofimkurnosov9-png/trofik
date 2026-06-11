<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'bd.php';

$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name'] ?? '');
    $login = trim($_POST['login'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    // Проверка на пустые поля
    if (empty($name) || empty($login) || empty($email) || empty($password)) {
        $error_message = "Заполните все поля!";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Используем INSERT IGNORE или проверяем существование
        $check_sql = "SELECT id FROM users WHERE login = ? OR email = ?";
        $check_stmt = $connect->prepare($check_sql);
        $check_stmt->bind_param("ss", $login, $email);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();
        
        if ($check_result->num_rows > 0) {
            $error_message = "Пользователь с таким логином или email уже существует!";
        } else {
            $sql = "INSERT INTO users (name, login, email, password) VALUES (?, ?, ?, ?)";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("ssss", $name, $login, $email, $hashed_password);
            
            if ($stmt->execute()) {
                $success_message = "Пользователь успешно зарегистрирован!";
                // Очищаем форму
                $_POST = [];
            } else {
                $error_message = "Ошибка регистрации: " . $stmt->error;
            }
            $stmt->close();
        }
        $check_stmt->close();
    }
}
?>

<?php include 'header.php'; ?>

<section style="min-height: 80vh;" class="d-flex align-items-center">
    <div class="container py-3">
        <div class="w-50 mx-auto">
            <h2 class="text-center mb-4">Регистрация пользователя</h2>
            
            <?php if ($success_message): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $success_message; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            
            <?php if ($error_message): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $error_message; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control rounded-pill shadow-sm px-3" id="name" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" class="form-control rounded-pill shadow-sm px-3" id="login" name="login" value="<?php echo htmlspecialchars($_POST['login'] ?? ''); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control rounded-pill shadow-sm px-3" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control rounded-pill shadow-sm px-3" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 rounded-pill py-2">Зарегистрироваться</button>
            </form>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>