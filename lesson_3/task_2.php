<?php
header('Content-type: text/html; charset=UTF-8');
/*2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
0 – это ноль.
1 – нечетное число.
2 – четное число.
3 – нечетное число.
…
10 – четное число.
*/

function foo() {
  $i = 0;
  
  do {
    if ($i === 0) {
      $str = 'это ноль';
    } elseif ($i % 2) {
      $str = 'нечетное число';
    } else {
      $str = 'четное число';
    }
    echo "{$i} - {$str}.<br>";
    $i++;
  } while ($i <= 10);
}

foo();