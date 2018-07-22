<?php

/**
 * Возвращает сущестующее подключение к базе или создает новое
 * @return mysqli
 */
function dbConnection() {
  static $db;
  if (!$db) {
    $config = include CONFIG_DIR . 'db.php';
    $db = mysqli_connect($config['server'], $config['login'], $config['password'], $config['dbName']);
  }
  return $db;
}

/**
 * Делает запрос к БД и возвращает либо ответ, либо код ошибки в зависимости от второго параметра
 * @param string $query строка запроса
 * @param bool $err ключ, если false, то возвращает ответ от БД, true - код ошибки
 * @return bool|int|mysqli_result
 */
function dbQuerySet($query, $key = false) {
  
  $res = mysqli_query(dbConnection(), $query);
  
  if ($key === 'error') {
    $res = mysqli_errno(dbConnection());
  } elseif ($key === 'id'){
    $res = mysqli_insert_id(dbConnection());
  }
  return $res;
}


/**
 * Делает запрос к БД и конвертирует ответ в ассациативный массив состоящий из всей выборки из БД
 * @param string $query строка запроса
 * @return array|bool|int|mysqli_result|null
 */
function dbQueryGetAll($query) {
  $respons = dbQuerySet($query);
  if ($respons) {
    return mysqli_fetch_all($respons, MYSQLI_ASSOC);
  }
  return $respons;
}

/**
 * Делает запрос к БД и конвертирует ответ в ассациативный массив состоящий из одного элемента
 * @param string $query строка запроса
 * @return array|bool|int|mixed|mysqli_result|null
 */
function dbQueryGetOne($query) {
  $respons = dbQueryGetAll($query);
  if ($respons) {
    return $respons[0];
  }
  return $respons;
}

