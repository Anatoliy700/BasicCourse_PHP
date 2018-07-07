<?php

function addImages($files, $options) {
  if (isset($files[$options['inputName']])) {//если файл пришел
    $file = $files[$options['inputName']];
    
    //если файл соответсвует разрешенному типу и его размер не превышает допустимый идем дальше, иначе удаляем его из временной папки
    if (in_array($file['type'], $options['validFileType'], true) && $file['size'] <= $options['validSizeImage']) {
      $newNameImage = $file['name'];
      $arrFiles = scandir(IMG_MIN_DIR);
      
      //если файл с таким именем существует, то добавляем к нему случайное число пока имя не станет уникальным
      $matches = [];
      while (in_array($newNameImage, $arrFiles, true)) {
        
        //если регулярка еще не отработала
        if (!$matches) {
          
          //если регулярка не нашла нужные данные, то удаляем файл и прерываем выполнение кода
          if (!preg_match($options['regPattern'], $file['name'], $matches) || count($matches) !== 3) {
            unlink($file['tmp_name']);
            return false;
          }
        }
        $newNameImage = $matches[1] . '-' . rand(1000, 999999999) . '.' . $matches[2];
      }
      //если перемешение прошло успешно идем дальше, иначе удаляем файл из временной папки
      if (move_uploaded_file($file['tmp_name'], IMG_MAX_DIR . $newNameImage)) {
        
        //если сжатие не прошло успешно, то удаляем и оригинал
        if (!img_resize(IMG_MAX_DIR . $newNameImage, IMG_MIN_DIR . $newNameImage, $options['imageWidth'], $options['imageHeight'])) {
          unlink(IMG_MAX_DIR . $newNameImage);
        }
      } else {
        unlink($file['tmp_name']);
      }
    } else {
      unlink($file['tmp_name']);
    }
  } else {
    return false;
  }
  return true;
}
