<?php

function dbConnection() {
  static $db;
  if (!$db) {
    $db = mysqli_connect('localhost', 'root', '', 'php_1_shop');
  }
  return $db;
}

function dbQuerySet($query) {
  return mysqli_query(dbConnection(), $query);
}


function dbQueryGetAll($query) {
  $respons = dbQuerySet($query);
  return mysqli_fetch_all($respons, MYSQLI_ASSOC);
}

function dbQueryGetOne($query) {
  $respons = dbQueryGetAll($query);
  return $respons[0];
}

