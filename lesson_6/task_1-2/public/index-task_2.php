<?php
/*2. Создать калькулятор, который будет определять тип выбранной пользователем операции, ориентируясь на нажатую кнопку.*/

require __DIR__ . '/../constants.php';
require ROOT_DIR . 'mathFunctions.php';
require ROOT_DIR . 'render.php';

header('Content-type: text/html; charset=UTF-8');

$out = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $numA = $_POST['numA'];
  $numB = $_POST['numB'];
  $operation = $_POST['operation'];
  $res = mathOperation($numA, $numB, $operation);
  if (is_numeric($res)) {
    $out = 'Результат операции: ' . $res;
  } else {
    $out = 'Ошибка: ' . $res;
  }
}

render('template-task_2', [
  'out' => $out
]);

