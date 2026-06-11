<?php
// Преобразуем двумерный ассоциативный массив в многомерный
// Разбиваем неатомарные поля на отдельные элементы
$discography = [
    [
        "id" => "1",
        "name" => "Atom Heart Mother",
        "date" => "10 октября 1970",
        "label" => ["EMI", "Harvest", "Capitol"],
        "format" => ["LP", "CD"],
        "status" => [
            "USA" => "Золотой"
        ]
    ],
    [
        "id" => "2",
        "name" => "Meddle",
        "date" => "30 октября 1971",
        "label" => ["EMI", "Harvest", "Capitol"],
        "format" => ["Vinyl", "Кассета", "CD"],
        "status" => [
            "USA" => "Платиновый"
        ]
    ],
    [
        "id" => "3",
        "name" => "Obscured by Clouds",
        "date" => "3 июня 1972",
        "label" => ["EMI", "Harvest", "Capitol"],
        "format" => ["LP", "Кассета", "CD"],
        "status" => [
            "USA" => "Золотой",
            "GBR" => "Серебряный"
        ]
    ],
    [
        "id" => "4",
        "name" => "The Dark Side of the Moon",
        "date" => "17 марта 1973",
        "label" => ["Harvest", "Capitol", "EMI"],
        "format" => ["LP", "Кассета", "CD", "SACD"],
        "status" => [
            "USA" => "Платиновый",
            "GBR" => "Платиновый",
            "CAN" => "Бриллиантовый"
        ]
    ],
    [
        "id" => "5",
        "name" => "Wish You Were Here",
        "date" => "15 сентября 1975",
        "label" => ["Harvest", "EMI", "Columbia", "Capitol"],
        "format" => ["LP", "8-track", "Кассета", "CD", "SACD"],
        "status" => [
            "USA" => "Платиновый",
            "GBR" => "Золотой",
            "CAN" => "Платиновый"
        ]
    ],
    [
        "id" => "6",
        "name" => "Animals",
        "date" => "23 января 1977",
        "label" => ["Harvest", "EMI", "Columbia", "Capitol"],
        "format" => ["LP", "8-track", "Кассета", "CD"],
        "status" => [
            "USA" => "Платиновый",
            "GBR" => "Золотой",
            "CAN" => "Платиновый"
        ]
    ],
    [
        "id" => "7",
        "name" => "The Wall",
        "date" => "30 ноября 1979",
        "label" => ["Harvest", "EMI", "Columbia", "Capitol"],
        "format" => ["LP", "8-track", "Кассета", "CD"],
        "status" => [
            "USA" => "Платиновый",
            "GBR" => "Платиновый",
            "CAN" => "Бриллиантовый",
            "NLD" => "Платиновый"
        ]
    ],
    [
        "id" => "8",
        "name" => "The Final Cut",
        "date" => "21 марта 1983",
        "label" => ["Harvest", "EMI", "Columbia", "Capitol"],
        "format" => ["LP", "8-track", "Кассета", "CD"],
        "status" => [
            "USA" => "Платиновый",
            "GBR" => "Золотой",
            "NLD" => "Золотой"
        ]
    ],
    [
        "id" => "9",
        "name" => "A Momentary Lapse of Reason",
        "date" => "8 сентября 1987",
        "label" => ["EMI", "Columbia"],
        "format" => ["LP", "Кассета", "CD"],
        "status" => [
            "USA" => "Платиновый",
            "GBR" => "Золотой",
            "CAN" => "Платиновый",
            "NLD" => "Золотой"
        ]
    ],
    [
        "id" => "10",
        "name" => "The Division Bell",
        "date" => "30 марта 1994",
        "label" => ["EMI", "Columbia"],
        "format" => ["LP", "Кассета", "CD"],
        "status" => [
            "USA" => "Платиновый",
            "GBR" => "Платиновый",
            "CAN" => "Платиновый",
            "NLD" => "Платиновый"
        ]
    ]
];

// Выводим массив в браузер через print_r
echo "<pre>";
print_r($discography);
echo "</pre>";
?>