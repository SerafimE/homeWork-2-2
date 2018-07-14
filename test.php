<?php declare(strict_types=1);
$allTests = glob(__DIR__ . './upload/*.json');
$number = implode($_GET);
$test = file_get_contents($number);
$testDecode = json_decode($test, true);
var_dump($testDecode);

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тест</title>
</head>
<body>
<form action="" method="post">
    <?php foreach ($testDecode as $key => $value) { ?>
        <fieldset><?php $question = $value['question'];
            echo $question . '<br>';
            $answers = $value['answers'];
            $correctAnswer = $value['correctAnswer'];
            foreach ($answers as $item) { ?>
                <label><input type="checkbox" name="checkBox" value="check"><?php echo $item . '<br>' ?></label>
            <?php } ?>
        </fieldset>
    <?php } ?>
    <?php var_dump($_POST) ?>
    <label><input type="text" name="name" placeholder="Ваше имя">Введите Ваше имя</label>
    <input type="submit" name="checkTest" value="Отправить">
</form>

<ul>
    <li><a href="admin.php">Загрузить тест</a></li>
    <li><a href="list.php">Список тестов</a></li>
</ul>

</body>
</html>
