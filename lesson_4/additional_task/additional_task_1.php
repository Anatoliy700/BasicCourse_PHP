<?php
//1. Написать функцию, отображающую все дерево файлов и каталогов, начиная от указанной директории.

header('Content-type: text/html; charset=windows-1251');
//header('Content-type: text/html; charset=UTF-8');
$dir = 'D:\Web\WebStormProjects\BasicCourse_PHP\lesson_4';

function displayDirectory($dir, $recursion = 0) {
  preg_match("/[\\\,\/]([\wа-яё\-\.\s]*)$/i", $dir, $matches);
  
  $dirName = $matches[1];
  $out = '';
  if (!$recursion) {
    $out .= '<ul><li>';
  }
  $out .= $dirName;
  $out .= "<ul>";
  $arrFiles = array_diff(scandir($dir), array('..', '.'));
  foreach ($arrFiles as $fileName) {
    $file = $dir . '/' . $fileName;
    if (is_dir($file)) {
      $out .= "<li>" . displayDirectory($file, 1) . "</li>";
    } else {
      $out .= "<li>{$fileName}</li>";
    }
  }
  
  if (!$recursion) {
    $out .= '</ul></li>';
  }
  return $out .= '</ul>';
}

echo displayDirectory($dir);