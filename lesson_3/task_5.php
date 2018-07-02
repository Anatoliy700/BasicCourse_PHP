<?php
header('Content-type: text/html; charset=UTF-8');
//5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.

function replaceSpace($str) {
  $outStr = '';
  for ($i = 0; $i < mb_strlen($str); $i++) {
    $char = mb_substr($str, $i, 1);
    if ($char == ' ') {
      $outStr .= '_';
    } else {
      $outStr .= $char;
    }
  }
  return $outStr;
}

$string = 'Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.';
echo replaceSpace($string);