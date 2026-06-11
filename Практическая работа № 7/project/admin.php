<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'bd.php';

// Простой SELECT запрос (без prepare и bind_param для SELECT всех записей)
$sql = "SELECT id, name, login, email FROM users";
$result = $connect->query($sql);

$users = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
?>

<?php include 'header.php'; ?>

<!-- Основной контент -->
<section style="min-height: 80vh;" class="py-4">
    <div class="container">
        <h2 class="text-center mb-4">Список пользователей</h2>
        
        <?php if (empty($users)): ?>
            <div class="alert alert-info text-center">
                Нет зарегистрированных пользователей. 
                <a href="index.php" class="alert-link">Добавьте первого пользователя</a>
            </div>
        <?php else: ?>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Логин</th>
                        <th>Email</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo htmlspecialchars($user['login']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Редактировать</a>
                            <a href="delete.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены?')">Удалить</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php endif; ?>
        
        <div class="text-center mt-3">
            <a href="index.php" class="btn btn-primary">Добавить нового пользователя</a>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>