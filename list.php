<?php
$fileList = glob('uploads/*.json');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список тестов</title>
</head>
<body>

<?php
foreach ($fileList as $key => $file) {
    $fileTest = file_get_contents($file);
    $decodeFile = json_decode($fileTest, true);
    foreach ($decodeFile as $test) {
        echo "<a href=\"test.php?test=$key\">Тест</a><br>";
    }
}
?>

<ul>
    <li><a href="admin.php">Загрузить тест</a></li>
    <li><a href="list.php">Список тестов</a></li>
</ul>

</body>
</html>