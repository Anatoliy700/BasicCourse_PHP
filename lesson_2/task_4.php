<?php
function add($a, $b)
{
  return $a + $b;
}

function sub($a, $b)
{
  return $a - $b;
}

function mult($a, $b)
{
  return $a * $b;
}

function divis($a, $b)
{
  return $a / $b;
}

function mathOperation($arg1, $arg2, $operation)
{
  switch ($operation) {
    case '+':
      return add($arg1, $arg2);
    case '-':
      return sub($arg1, $arg2);
    case '*':
      return mult($arg1, $arg2);
    case '/':
      return divis($arg1, $arg2);
  }
  return false;
}

echo mathOperation(16, 8, '+'), '<br>';
echo mathOperation(16, 8, '-'), '<br>';
echo mathOperation(16, 8, '*'), '<br>';
echo mathOperation(16, 8, '/'), '<br>';


