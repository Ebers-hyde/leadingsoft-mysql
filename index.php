<?php 
require_once('vendor/connect.php');

/*
Получаем выборку из базы данных тех пользователей, за которыми закреплены объекты (ноутбуки, например),
названия объектов, статус
*/
$result = $connect->query('SELECT users.login AS `Логин пользователя`, objects.name AS `Название ноутбука`, objects.status AS `Статус` 
FROM users INNER JOIN objects ON users.object_id=objects.object_id');

//создаём массив и в каждый элемент записываем ключи со значениями: логин, относящийся объект, статус объекта
$records = array();
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $records[] = $row;
};
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Вывод выборки таблицей с помощью цикла foreach для каждого элемента массива-->
    <table>
    <tr>
    <td>Логин пользователя</td>
    <td>Название ноутбука</td>
    <td>Статус ноутбука</td>
    </tr>
    <?php foreach($records as $record):?>
    <tr>
    <td><?=$record['Логин пользователя']?></td>
    <td><?=$record['Название ноутбука']?></td>
    <td><?=$record['Статус']?></td>
    </tr>
    <?php endforeach;?>
    </table>
</body>
</html>