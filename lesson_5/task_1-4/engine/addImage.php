<?php

/**
 * Добавляет изображение в галерею, если изображение с таким именем уже существует,
 * то добавляет к имени случайное число пока имя не станет уникальным.
 * @param $files {Array} сисемный массив $_FILES с данными о загруженном файле пользователя.
 * @param $options {Array} массив с настройками
 * @return bool в случае удачного добавления возвращает true, иначе false.
 */
function addImages($files, $options) {
  if (isset($files[$options['inputName']])) {//если файл пришел
    $file = $files[$options['inputName']];
    
    //если файл соответсвует разрешенному типу и его размер не превышает допустимый идем дальше, иначе удаляем его из временной папки
    if (in_array($file['type'], $options['validFileType'], true) && $file['size'] <= $options['validSizeImage']) {
      
      $matches = [];
      //если регулярка не нашла нужные данные, то прерываем выполнение кода
      if (!preg_match($options['regPattern'], $file['name'], $matches) || count($matches) !== 3) {
        return false;
      }
      
      $nameImage = $matches[1];
      $arrFilesName = dbQueryGetColumn('SELECT name FROM images');
      
      //если файл с таким именем существует, то добавляем к нему случайное число пока имя не станет уникальным
      while (in_array($nameImage, $arrFilesName, true)) {
        
        $nameImage = $matches[1] . '-' . rand(1000, 999999999);
      }
      
      //добавляем расширение к имени файла
      $fullNameImage = $nameImage . $matches[2];
      
      //если перемешение прошло успешно идем дальше
      if (move_uploaded_file($file['tmp_name'], IMG_MAX_DIR . $fullNameImage)) {
        
        //если сжатие не прошло успешно, то удаляем и оригинал
        if (!img_resize(IMG_MAX_DIR . $fullNameImage, IMG_MIN_DIR . $fullNameImage, $options['imageWidth'], $options['imageHeight'])) {
          unlink(IMG_MAX_DIR . $fullNameImage);
          return false;
        }
        $urlMaxImage = IMG_MAX_URL . $fullNameImage;
        $urlMinImage = IMG_MIN_URL . $fullNameImage;
        $query = "INSERT INTO images (name, url_max, url_min) VALUES ('{$nameImage}', '{$urlMaxImage}', '{$urlMinImage}')";
        if (dbQuerySet($query)) {
          return true;
        }
      }
    }
  }
  return false;
}
