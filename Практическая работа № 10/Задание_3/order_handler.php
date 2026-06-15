<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обработчик заказа</title>
</head>
<body>

<h2>Данные о заказчике и заказе</h2>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $customer = [
        "Имя"      => $_POST["customer_name"] ?? "",
        "Email"    => $_POST["customer_email"] ?? "",
        "Телефон"  => $_POST["customer_phone"] ?? ""
    ];


    $ordersJson = $_POST["orders_json"] ?? "";
    $ordersArray = json_decode($ordersJson, true);

    echo "<h3>Заказчик:</h3>";
    echo "<pre>";
    print_r($customer);
    echo "</pre>";

    echo "<h3>Заказ (товары):</h3>";
    if ($ordersArray) {
        echo "<pre>";
        print_r($ordersArray);
        echo "</pre>";
    } else {
        echo "<p>Ошибка: не удалось получить данные заказа.</p>";
    }

} else {
    echo "<p>Ошибка: форма не была отправлена.</p>";
}
?>

</body>
</html>