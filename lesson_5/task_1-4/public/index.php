<?php
/*
1. Создать галерею изображений, состоящую из двух страниц:
просмотр всех фотографий (уменьшенных копий);
просмотр конкретной фотографии (изображение оригинального размера) по ее ID в базе данных.
2. В базе данных создать таблицу, в которой будет храниться информация о картинках (адрес на сервере, размер, имя).
3. *На странице просмотра фотографии полного размера под картинкой должно быть указано число ее просмотров.
4. *На странице просмотра галереи список фотографий должен быть отсортирован по популярности. Популярность = число кликов по фотографии.
*/

header('Content-type: text/html; charset=UTF-8');

include __DIR__ . '/../config/constants.php';
include ENGINE_DIR . 'addImage.php';
include ENGINE_DIR . 'resize.php';
include ENGINE_DIR . 'mysqlFunction.php';
$options = [
  'inputName' => 'file',//имя input для загрузки файлов
  'validSizeImage' => 1500000,//максимально допустимый размер картинки
  'validFileType' => ['image/jpeg', 'image/png'],//допустимый тип файла
  'imageWidth' => 250,//ширина сжатой картинки
  'imageHeight' => 150,//высота сжатой картинки
  'regPattern' => '/^([\w,-]*)\.(\w{3,4})$/'
];

//var_dump($_FILES);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $test = addImages($_FILES, $options);
  header("Location: {$_SERVER['DOCUMENT_URI']}");
}
$query = 'SELECT * FROM images';

$arrImages = dbQuery($query);

var_dump($_SERVER);

include TEMPLATES_DIR . 'gallery_all.php';





