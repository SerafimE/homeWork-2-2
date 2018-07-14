<?php declare(strict_types=1);
$allTests = glob(__DIR__ . './upload/*.json');
$number = implode($_GET);
$test = file_get_contents($number);
$testDecode = json_decode($test, true);
$correctAnswer = [];
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
            $correctAnswer[] = $value['correctAnswer'];
            foreach ($answers as $item) { ?>
                <label><input type="checkbox" name="<?php echo $key ?>"
                              value="<?php echo $item ?>"><?php echo $item . '<br>' ?></label>
            <?php } ?>
        </fieldset>
    <?php } ?>
    <?php

    if ($_POST == $correctAnswer) {
        echo '<h2 style="color:#17A05D">Правильно!</h2>';
    } elseif ($_POST == null) {
        echo '<h2 style="color:#4C8BF5">Выберите правильные варианты</h2>';
    } else echo '<h2 style="color:#DE5347">Один или несколько ответов не верны. Ещё раз?</h2>';
    ?>
    <input type="submit" value="Отправить">
</form>

<ul>
    <li><a href="admin.php">Загрузить тест</a></li>
    <li><a href="list.php">Список тестов</a></li>
</ul>

</body>
</html>
