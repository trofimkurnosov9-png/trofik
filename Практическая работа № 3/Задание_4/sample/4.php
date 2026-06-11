<?php
// Создаем двумерный индексный массив с данными дискографии Pink Floyd
$discography = [
    // Заголовки таблицы
    ["ID", "Название альбома", "Дата выпуска", "Лейбл", "Формат", "Статус"],
    // Данные альбомов
    [1, "Atom Heart Mother", "10 октября 1970", "EMI, Harvest, Capitol", "LP, CD", "Золотой (USA)"],
    [2, "Meddle", "30 октября 1971", "EMI, Harvest, Capitol", "Vinyl, Kacceta, CD", "Платиновый (USA)"],
    [3, "Obscured by Clouds", "3 июня 1972", "EMI, Harvest, Capitol", "LP, Kacceta, CD", "Золотой (USA), Серебряный (GBR)"],
    [4, "The Dark Side of the Moon", "17 марта 1973", "Harvest, Capitol, EMI", "LP, Kacceta, CD, SACD", "Платиновый (USA), Платиновый (GBR), Бриллиантовый (CAN)"],
    [5, "Wish You Were Here", "15 сентября 1975", "Harvest, EMI, Columbia, Capitol", "LP, 8-track, Kacceta, CD, SACD", "Платиновый (USA), Золотой (GBR), Платиновый (CAN)"],
    [6, "Animals", "23 января 1977", "Harvest, EMI, Columbia, Capitol", "LP, 8-track, Kacceta, CD", "Платиновый (USA), Золотой (GBR), Платиновый (CAN)"],
    [7, "The Wall", "30 ноября 1979", "Harvest, EMI, Columbia, Capitol", "LP, 8-track, Kacceta, CD", "Платиновый (USA), Платиновый (GBR), Бриллиантовый (CAN), Платиновый (NLD)"],
    [8, "The Final Cut", "21 марта 1983", "Harvest, EMI, Columbia, Capitol", "LP, 8-track, Kacceta, CD", "Платиновый (USA), Золотой (GBR), Золотой (NLD)"],
    [9, "A Momentary Lapse of Reason", "8 сентября 1987", "EMI, Columbia", "LP, Kacceta, CD", "Платиновый (USA), Золотой (GBR), Платиновый (CAN), Золотой (NLD)"],
    [10, "The Division Bell", "30 марта 1994", "EMI, Columbia", "LP, Кассета, CD", "Платиновый (USA), Платиновый (GBR), Платиновый (CAN), Платиновый (NLD)"]
];

// Выводим массив в браузер через print_r
echo "<pre>";
print_r($discography);
echo "</pre>";
?>