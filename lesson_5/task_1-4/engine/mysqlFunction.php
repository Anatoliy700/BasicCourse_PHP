<?php
/**
 * Возвращает мвссив данных запроса.
 * @param $query {string} строка запроса к базе двнных.
 * @return array|bool В случае успешного получения данных возвращает массив иначе false.
 */
function dbQueryGetAll($query) {
  global $db;
  if (!$db || !mysqli_ping($db)) {
    $db = mysqli_connect('localhost', 'root', '', 'galery');
  }
  $respons = mysqli_query($db, $query);
  $out = false;
  if ($respons) {
    $out = mysqli_fetch_all(mysqli_query($db, $query), MYSQLI_ASSOC);
  }
//  mysqli_close($db);
  return $out;
}

/**
 * Добавляет либо обновляет данные в базе данных.
 * @param $query {string} строка запроса к базе двнных.
 * @return bool В случае успешного добавления(изменения) данных возвращает true иначе false.
 */
function dbQuerySet($query) {
  global $db;
  if (!$db || !mysqli_ping($db)) {
    $db = mysqli_connect('localhost', 'root', '', 'galery');
  }
  $respons = mysqli_query($db, $query);
  $out = false;
  if ($respons === true) {
    $out = true;
  }
//  mysqli_close($db);
  return $out;
}

/**
 * Возвращает массив данных одного столбца
 * @param $query {string} строка запроса к базе двнных.
 * @return array|bool В случае успешного получения данных возвращает массив иначе false.
 */
function dbQueryGetColumn($query) {
  global $db;
  if (!$db || !mysqli_ping($db)) {
    $db = mysqli_connect('localhost', 'root', '', 'galery');
  }
  $respons = mysqli_query($db, $query);
  $out = false;
  if ($respons->field_count === 1) {
    $out = [];
    while ($row = mysqli_fetch_row($respons)) {
      $out[] = $row[0];
    }
  }
//  mysqli_close($db);
  return $out;
}
