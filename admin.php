<?php
if (isset($_POST) && isset($_FILES) && isset($_FILES['testFile'])) {
    $fileName = $_FILES['testFile']['name'];
    $tmpFile = $_FILES['testFile']['tmp_name'];
    $uploadsDir = 'uploads/';
    $pathInfo = pathinfo($uploadsDir . $fileName);
    if ($pathInfo['extension'] === 'json') {
        move_uploaded_file($tmpFile, $uploadsDir . $fileName);
        echo 'Спасибо, Ваш тест загружен!';
    } else {
        echo 'Извините, нужен файл с расширением .json';
    }
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Загрузить тест</title>
</head>
<body>

<form method="post" enctype=multipart/form-data>
    <input type=file name="testFile">
    <input type=submit value=Загрузить>
</form>

<ul>
    <li><a href="admin.php">Загрузить тест</a></li>
    <li><a href="list.php">Список тестов</a></li>
</ul>
</body>
</html>