<?php
require_once ENGINE_DIR . 'db.php';


function getUserById($userId) {
  $id = (int)$userId;
  if ($id) {
    $query = "SELECT * FROM users WHERE id = {$id}";
    return dbQueryGetOne($query);
  }
}

/*function getUserByName($userName){
  $nameValid = mysqli_real_escape_string(dbConnection(), trim($userName));
  if($nameValid){
    $query = "SELECT * FROM users WHERE id = {$id}";
    return dbQueryGetOne($query);
  }
}*/

function addNewUser($login, $name, $pass) {
  $loginValid = mysqli_real_escape_string(dbConnection(), trim($login));
  $nameValid = mysqli_real_escape_string(dbConnection(), trim($name));
  $passValid = mysqli_real_escape_string(dbConnection(), trim($pass));
  $hashPass = password_hash($passValid, PASSWORD_DEFAULT);
  $query = "INSERT INTO users (login, name, pass) VALUES ('{$loginValid}', '{$nameValid}', '{$hashPass}')";
  $res = dbQuerySet($query, true);
  return $res;
}


function checkAuthUsers() {
  if ($_SESSION['user_id'] && $_SESSION['auth']) {
    return $_SESSION['auth'];
  }
  return false;
}

function authenticationUser($login, $pass) {
  $isAuth = -1;
  $loginValid = mysqli_real_escape_string(dbConnection(), trim($login));
  $passValid = mysqli_real_escape_string(dbConnection(), trim($pass));
  $query = "SELECT id, pass FROM users WHERE login = '{$loginValid}'";
  $user = dbQueryGetOne($query);
  if ($user) {
    $isAuth = 0;
    if (password_verify($passValid, $user['pass'])) {
      $isAuth = $user['id'];
    }
  }
  return $isAuth;
}


