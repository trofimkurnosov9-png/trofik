<?php
// Создаем двумерный ассоциативный массив с данными дискографии Pink Floyd
$discography = [
    [
        "id" => 1,
        "album_name" => "Atom Heart Mother",
        "release_date" => "10 октября 1970",
        "label" => "EMI, Harvest, Capitol",
        "format" => "LP, CD",
        "status" => "Золотой (USA)"
    ],
    [
        "id" => 2,
        "album_name" => "Meddle",
        "release_date" => "30 октября 1971",
        "label" => "EMI, Harvest, Capitol",
        "format" => "Vinyl, Kacceta, CD",
        "status" => "Платиновый (USA)"
    ],
    [
        "id" => 3,
        "album_name" => "Obscured by Clouds",
        "release_date" => "3 июня 1972",
        "label" => "EMI, Harvest, Capitol",
        "format" => "LP, Kacceta, CD",
        "status" => "Золотой (USA), Серебряный (GBR)"
    ],
    [
        "id" => 4,
        "album_name" => "The Dark Side of the Moon",
        "release_date" => "17 марта 1973",
        "label" => "Harvest, Capitol, EMI",
        "format" => "LP, Kacceta, CD, SACD",
        "status" => "Платиновый (USA), Платиновый (GBR), Бриллиантовый (CAN)"
    ],
    [
        "id" => 5,
        "album_name" => "Wish You Were Here",
        "release_date" => "15 сентября 1975",
        "label" => "Harvest, EMI, Columbia, Capitol",
        "format" => "LP, 8-track, Kacceta, CD, SACD",
        "status" => "Платиновый (USA), Золотой (GBR), Платиновый (CAN)"
    ],
    [
        "id" => 6,
        "album_name" => "Animals",
        "release_date" => "23 января 1977",
        "label" => "Harvest, EMI, Columbia, Capitol",
        "format" => "LP, 8-track, Kacceta, CD",
        "status" => "Платиновый (USA), Золотой (GBR), Платиновый (CAN)"
    ],
    [
        "id" => 7,
        "album_name" => "The Wall",
        "release_date" => "30 ноября 1979",
        "label" => "Harvest, EMI, Columbia, Capitol",
        "format" => "LP, 8-track, Kacceta, CD",
        "status" => "Платиновый (USA), Платиновый (GBR), Бриллиантовый (CAN), Платиновый (NLD)"
    ],
    [
        "id" => 8,
        "album_name" => "The Final Cut",
        "release_date" => "21 марта 1983",
        "label" => "Harvest, EMI, Columbia, Capitol",
        "format" => "LP, 8-track, Kacceta, CD",
        "status" => "Платиновый (USA), Золотой (GBR), Золотой (NLD)"
    ],
    [
        "id" => 9,
        "album_name" => "A Momentary Lapse of Reason",
        "release_date" => "8 сентября 1987",
        "label" => "EMI, Columbia",
        "format" => "LP, Kacceta, CD",
        "status" => "Платиновый (USA), Золотой (GBR), Платиновый (CAN), Золотой (NLD)"
    ],
    [
        "id" => 10,
        "album_name" => "The Division Bell",
        "release_date" => "30 марта 1994",
        "label" => "EMI, Columbia",
        "format" => "LP, Кассета, CD",
        "status" => "Платиновый (USA), Платиновый (GBR), Платиновый (CAN), Платиновый (NLD)"
    ]
];

// Выводим массив в браузер  через var_dump
echo "<pre>";
var_dump($discography);
echo "</pre>";
?>