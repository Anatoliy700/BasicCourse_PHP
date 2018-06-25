<?php
//todo: task_1
$name = 'Анатолий';
$age = 37;
$nowDate = date('d-m-y H:i');
$strOutput = "Меня зовут {$name}.<br>Через год мне будет ".($age + 1)." лет, а еще через год ".($age + 2)." лет.<br>На моих часах сейчас: {$nowDate}";
echo 'Задание 1:<br>';
echo $strOutput;

//todo: task_2
$newStrOutput = str_replace(" ", "_", $strOutput);
echo '<br><br>Задание 2:<br>';
echo $newStrOutput;

//todo: task_3
$arrOfStrOutput = explode("<br>", $strOutput);
echo '<br><br>Задание 3:<br>';
echo $arrOfStrOutput[count($arrOfStrOutput) - 1];
