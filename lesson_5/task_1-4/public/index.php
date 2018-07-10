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
  'regPattern' => '/^([\w,-]*)\.(\w{3,4})$/' //регулярное выражения для получения отдельно имени файла и расшерения
];

//добавляем картинку
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $test = addImages($_FILES, $options);
  header("Location: {$_SERVER['DOCUMENT_URI']}");
}
//открываем картинку по id
if (isset($_GET['id'])) {
  $id = (int)$_GET['id'];
  if ($id && in_array($id, dbQueryGetColumn('SELECT id FROM images'))) {
    $query_select = "SELECT * FROM images WHERE id = {$id}";
    $query_increment = "UPDATE images SET count = count+1 WHERE id = {$id}";
    $image = dbQueryGetAll($query_select);
    if ($image) {
      dbQuerySet($query_increment);
      include TEMPLATES_DIR . 'gallery_one.php';
    }
  } else {
    header("Location: {$_SERVER['DOCUMENT_URI']}");
  }
  //показываем все картинки
} else {
  $query = 'SELECT id, name, url_min FROM images ORDER BY count DESC';
  
  $arrImages = dbQueryGetAll($query);
  
  if ($arrImages) {
    include TEMPLATES_DIR . 'gallery_all.php';
  }
}





