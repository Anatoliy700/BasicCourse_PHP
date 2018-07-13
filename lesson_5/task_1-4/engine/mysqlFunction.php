<?php

function dbConnection() {
  static $db;
  if (!$db) {
    $db = mysqli_connect('localhost', 'root', '', 'galery');
  }
  return $db;
}

/**
 * Возвращает мвссив данных запроса.
 * @param $query {string} строка запроса к базе двнных.
 * @return array|bool В случае успешного получения данных возвращает массив иначе false.
 */
function dbQueryGetAll($query) {
  
  $respons = mysqli_query(dbConnection(), $query);
  return mysqli_fetch_all($respons, MYSQLI_ASSOC);
}

/**
 * Добавляет либо обновляет данные в базе данных.
 * @param $query {string} строка запроса к базе двнных.
 * @return bool В случае успешного добавления(изменения) данных возвращает true иначе false.
 */
function dbQuerySet($query) {
  return mysqli_query(dbConnection(), $query);
}

/**
 * Возвращает массив данных одного столбца
 * @param $query {string} строка запроса к базе двнных.
 * @return array|bool В случае успешного получения данных возвращает массив иначе false.
 */
function dbQueryGetColumn($query) {
  $respons = mysqli_query(dbConnection(), $query);
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
