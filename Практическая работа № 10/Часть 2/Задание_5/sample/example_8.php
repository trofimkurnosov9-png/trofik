<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Результат сохранения</title>

</head>
<body>
    <h1>Результат сохранения данных</h1>
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $lang = isset($_POST['lang']) ? $_POST['lang'] : [];
        $form = isset($_POST['form']) ? $_POST['form'] : '';
        $interes = isset($_POST['interes']) ? $_POST['interes'] : [];
        
        $errors = [];
        
        if (empty($name)) {
            $errors[] = "Поле 'Имя' обязательно для заполнения";
        }
        
        if (empty($email)) {
            $errors[] = "Поле 'E-mail' обязательно для заполнения";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Введите корректный E-mail адрес";
        }
        
        if (empty($form)) {
            $errors[] = "Выберите форму обучения";
        }
        
        if (!empty($errors)) {
            echo '<div class="result">';
            echo '<h3 style="color: red;">Ошибки при сохранении:</h3>';
            echo '<ul>';
            foreach ($errors as $error) {
                echo "<li style='color: red;'>$error</li>";
            }
            echo '</ul>';
            echo '<a href="index.php">← Вернуться к редактированию</a>';
            echo '</div>';
        } else {
            
            echo '<div class="result">';
            echo '<p class="success">✓ Данные успешно сохранены!</p>';
            echo '<h3>Сохраненные данные:</h3>';
            
            echo '<div class="data-item">';
            echo '<span class="label">Имя:</span>';
            echo htmlspecialchars($name);
            echo '</div>';
            
            echo '<div class="data-item">';
            echo '<span class="label">E-mail:</span>';
            echo htmlspecialchars($email);
            echo '</div>';
            
            echo '<div class="data-item">';
            echo '<span class="label">Выбранные курсы:</span>';
            if (!empty($lang)) {
                $langNames = [
                    'java' => 'Разработчик игр на Java',
                    'php' => 'Программирование на PHP',
                    'python' => 'Занимательный Python',
                    'perl' => 'Язык программирования Perl за 24 часа',
                    'javascript' => 'Javascript в примерах'
                ];
                $selectedLangs = [];
                foreach ($lang as $value) {
                    if (isset($langNames[$value])) {
                        $selectedLangs[] = $langNames[$value];
                    }
                }
                echo implode(', ', $selectedLangs);
            } else {
                echo 'Не выбрано ни одного курса';
            }
            echo '</div>';
            
            echo '<div class="data-item">';
            echo '<span class="label">Форма обучения:</span>';
            echo htmlspecialchars($form);
            echo '</div>';
            
            echo '<div class="data-item">';
            echo '<span class="label">Интересующие направления:</span>';
            if (!empty($interes)) {
                echo implode(', ', array_map('htmlspecialchars', $interes));
            } else {
                echo 'Не выбрано ни одного направления';
            }
            echo '</div>';
            
            echo '<a href="index.php">← Редактировать снова</a>';
            echo ' | ';
            echo '<a href="index.php">← На главную</a>';
            echo '</div>';
        }
         
    } else {
        echo '<div class="result">';
        echo '<p style="color: orange;">Нет данных для обработки. Пожалуйста, заполните форму.</p>';
        echo '<a href="index.php">← Перейти к форме редактирования</a>';
        echo '</div>';
    }
    ?>
    
</body>
</html>