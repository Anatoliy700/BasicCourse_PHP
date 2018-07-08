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


if (isset($_GET['id'])) {
//  var_dump($_GET);
  $id = $_GET['id'];
  $query = "SELECT * FROM images WHERE id = {$id}";
  $image = dbQuery($query);
//  var_dump($image);
//  header("Location: {$image[0]['url_max']}");
  include TEMPLATES_DIR . 'gallery_one.php';
}else{
  header("Location: /index.php");
}






