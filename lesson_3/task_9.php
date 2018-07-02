<?php
header('Content-type: text/html; charset=UTF-8');

/*9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).*/

$arrTranslit = [
  'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
  'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
  'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'ts',
  'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ъ' => '"', 'ы' => 'y', 'ь' => '`', 'э' => 'e', 'ю' => 'yu',
  'я' => 'ya'
];

function translit($str, $arrTranslit) {
  $outStr = '';
  for ($i = 0; $i < mb_strlen($str); $i++) {
    $char = mb_substr($str, $i, 1);
    if ($char == ' ') {
      $outStr .= '_';
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

$string = 'Объединить две ранее написанные функции в одну, которая получает строку на русском яыке, производит транслитерацию и Замену пробелов на подчеркивания';
echo translit($string, $arrTranslit);