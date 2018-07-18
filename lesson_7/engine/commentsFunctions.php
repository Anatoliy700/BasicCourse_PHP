<?php

require_once ENGINE_DIR . 'db.php';

/** Возвращает все комментарии из базы
 * @return string
 */
function getComments() {
  $query = 'SELECT id as id_comment, name, text, approved FROM comments';
  return json_encode(['comments' => dbQueryGetAll($query)]);
}

/**
 * Добавляет комментарий в базу
 * @param $params
 * @return string
 */
function addComments($params) {
  $name = mysqli_real_escape_string(dbConnection(), $params['name']);
  $text = mysqli_real_escape_string(dbConnection(), $params['text']);
  $query = "INSERT INTO comments (name, text) VALUES ('{$name}', '{$text}');";
  $res = (int)dbQuerySet($query);
  if ($res === 1) {
    $id = mysqli_insert_id(dbConnection());
    $response = json_encode([
      'result' => $res,
      'id' => $id
    ]);
  } else {
    $errorText = 'Ошибка БД';
    $response = json_encode([
      'result' => 0,
      'errorMessage' => $errorText
    ]);
  }
  
  
  return $response;
}

/**
 * Одобряет новый комментарий
 * @param $param
 * @return string
 */
function approvedComments($param) {
  $id = (int)$param;
  $query = "UPDATE comments SET approved = 1 WHERE id = {$id}";
  $res = (int)dbQuerySet($query);
  if ($res) {
    $response = json_encode(['result' => $res]);
  } else {
    $errorText = 'Ошибка БД';
    $response = json_encode([
      'result' => 0,
      'errorMessage' => $errorText
    ]);
  }
  return $response;
}

/**
 * Удаляет комментарий
 * @param $param
 * @return string
 */
function removeComments($param) {
  $id = (int)$param;
  $query = "DELETE FROM comments WHERE id = {$id}";
  $res = (int)dbQuerySet($query);
  if ($res) {
    $response = json_encode(['result' => $res]);
  } else {
    $errorText = 'Ошибка БД';
    $response = json_encode([
      'result' => 0,
      'errorMessage' => $errorText
    ]);
  }
  return $response;
}