<?php
//2. Написать функцию, удаляющуюю указанную папку(с ее полным очищением)

header('Content-type: text/html; charset=windows-1251');
$directory = 'D:\Web\WebStormProjects\BasicCourse_PHP\lesson_4\additional_task\test';

function deletingDirectory($dir) {
  $arrFiles = array_diff(scandir($dir), array('..', '.'));
  if (count($arrFiles)) {
    foreach ($arrFiles as $fileName) {
      $file = "{$dir}/{$fileName}";
      if (is_dir($file)) {
        deletingDirectory($file);
      } else {
        unlink($file);
      }
    }
  }
  return rmdir($dir);
}

echo deletingDirectory($directory);