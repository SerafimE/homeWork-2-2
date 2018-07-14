<?php declare(strict_types=1);

if (isset($_POST) && isset($_FILES) && isset($_FILES['testFile'])) {
    $oldFileName = $_FILES['testFile']['name'];
    $tmpFile = $_FILES['testFile']['tmp_name'];
    $uploadsDir = 'upload/';
    $location = './list.php';
    $pathInfo = pathinfo($uploadsDir . $oldFileName);
    $fileName = md5($pathInfo['filename']) . '.' . $pathInfo['extension'];
    if ($pathInfo['extension'] === 'json') {
        move_uploaded_file($tmpFile, $uploadsDir . $fileName);
        header("Location: $location");
    } else {
        echo '<h2>Извините, нужен файл с расширением .json</h2>';
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
<h2>После загрузки файла .json Вы будете перенаправлены на страницу со списком тестов.</h2>
<h3>Образец файла .json</h3>
<p>Количество блоков с вопросами может быть любым, количество вариантов ответов так же, но в разумных пределах,
    правильный ответ конечно один на блок.</p>
<pre>
[
  {
    "question": "Кто является создателем сети vk.com?",
    "answers": [
      "Юрий Гагарин",
      "Павел Дуров",
      "Марк Цукерберг",
      "Сергей Люляев"
    ],
    "correctAnswer": "Павел Дуров"
  },
  {
    "question": "Сколько будет 10*10?",
    "answers": [
      "100",
      "1000",
      "10",
      "85"
    ],
    "correctAnswer": "100"
  }
]
</pre>
</body>
</html>
