<?php
$fileList = glob('uploads/*.json');
$test = [];
foreach ($fileList as $key => $file) {
    if ($key == $_GET['test']) {
        $fileTest = file_get_contents($fileList[$key]);
        $decodeFile = json_decode($fileTest, true);
        $test = $decodeFile;
    }
}
$question = $test[0]['question'];
$answers[] = $test[0]['answers'];
// Считаем кол-во правильных ответов
$resultTrue = 0;
foreach ($answers[0] as $item) {
    if ($item['result'] === true) {
        $resultTrue++;
    }
}
$postTrue = 0;
$postFalse = 0;
if (count($_POST) > 0) {
    // Проверяем и считаем правильность введенных ответов
    foreach ($_POST as $key => $item) {
        if ($answers[0][$key]['result'] === true) {
            $postTrue++;
        } else {
            $postFalse++;
        }
    }
    // Сравниваем и выводим результат
    if ($postTrue === $resultTrue && $postFalse === 0) {
        echo 'Правильно!';
    } else {
        echo 'Не-а, НЕ правильно';
    }
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тест</title>
</head>
<body>

<form method="post">
    <fieldset>
        <legend><?php echo $question[0] ?></legend>
        <?php foreach ($answers[0] as $key => $item) { ?>
            <label><input type="radio" name="<?php echo $key; ?>"
                          value="<?php echo $item['answer'][0]; ?>"> <?php echo $item['answer'][0]; ?>
            </label>
        <?php } ?>
    </fieldset>
    <fieldset>
        <legend><?php echo $question[1] ?></legend>
        <?php foreach ($answers[0] as $key1 => $item1) { ?>
            <label><input type="radio" name="<?php echo $key1; ?>"
                          value="<?php echo $item1['answer'][1]; ?>"> <?php echo $item1['answer'][1]; ?>
            </label>
        <?php } ?>
    </fieldset>
    <input type="submit" value="Отправить">
</form>

<ul>
    <li><a href="admin.php">Загрузить тест</a></li>
    <li><a href="list.php">Список тестов</a></li>
</ul>

</body>
</html>
