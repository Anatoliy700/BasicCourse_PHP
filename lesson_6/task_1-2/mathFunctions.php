<?php
function add($a, $b) {
  return $a + $b;
}

function sub($a, $b) {
  return $a - $b;
}

function mult($a, $b) {
  return $a * $b;
}

function divis($a, $b) {
  if (!$b) {
    return 'Делить на "0" нельзя!';
  }
  return $a / $b;
}

function mathOperation($arg1, $arg2, $operation) {
  if (!is_numeric($arg1) || !is_numeric($arg2)) {
    return 'Аргументы должны быть числом!';
  }
  switch ($operation) {
    case '+':
      return add($arg1, $arg2);
    case '-':
      return sub($arg1, $arg2);
    case '*':
      return mult($arg1, $arg2);
    case '/':
      return divis($arg1, $arg2);
    default:
      return 'Выберите тип опреции!';
  }
}