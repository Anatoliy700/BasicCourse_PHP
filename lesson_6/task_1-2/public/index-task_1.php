<?php
/*
1. Создать форму-калькулятор с операциями: сложение, вычитание, умножение, деление. Не забыть обработать деление на ноль! Выбор операции можно осуществлять с помощью тега <select>.
*/


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
render('template-task_1', [
  'out' => $out
]);


