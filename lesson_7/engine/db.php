<?php

function dbConnection() {
  static $db;
  if (!$db) {
    $db = mysqli_connect('localhost', 'root', '', 'php_1_shop');
  }
  return $db;
}

function dbQuerySet($query, $err = false) {
  
  $res = mysqli_query(dbConnection(), $query);
  
  if ($err) {
    $res = mysqli_errno(dbConnection());
  }
  return $res;
}


function dbQueryGetAll($query) {
  $respons = dbQuerySet($query);
  if ($respons) {
    return mysqli_fetch_all($respons, MYSQLI_ASSOC);
  }
  return $respons;
}

function dbQueryGetOne($query) {
  $respons = dbQueryGetAll($query);
  if ($respons) {
    return $respons[0];
  }
  return $respons;
}

