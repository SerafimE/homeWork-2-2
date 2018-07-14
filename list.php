<?php declare(strict_types=1);
foreach (glob('./upload/*.json') as $file) {
    echo "<a href=\"test.php?test=$file\">Тест: $file</a><br>";
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список тестов</title>
</head>
<body>

<ul>
    <li><a href="admin.php">Загрузить тест</a></li>
    <li><a href="list.php">Список тестов</a></li>
</ul>

</body>
</html>
