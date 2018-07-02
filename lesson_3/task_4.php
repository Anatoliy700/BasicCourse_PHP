<?php
header('Content-type: text/html; charset=UTF-8');

/*4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
Написать функцию транслитерации строк.*/

$arrTranslit = [
  'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
  'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
  'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'ts',
  'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ъ' => '`', 'ы' => 'y', 'ь' => '`,i', 'э' => 'e', 'ю' => 'yu',
  'я' => 'ya'
];

function translit($str, $arrTranslit) {
  $outStr = '';
  for ($i = 0; $i < mb_strlen($str); $i++) {
    $char = mb_substr($str, $i, 1);
    if ($char == ' ') {
      $outStr .= ' ';
    } else {
      $translitChar = $arrTranslit[$char];
      if ($translitChar) {
        $outStr .= $translitChar;
      } else {
        $translitChar = $arrTranslit[mb_strtolower($char)];
        if (mb_strlen($translitChar) > 1) {
          $outStr .= mb_strtoupper(mb_substr($translitChar, 0, 1));
          $outStr .= mb_substr($translitChar, 1);
        } else {
          $outStr .= mb_strtoupper($translitChar);
        }
      }
    }
  }
  return $outStr;
}

echo translit('Тест ЕЩе тест', $arrTranslit);