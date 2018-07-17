<?php
require_once ENGINE_DIR . 'db.php';


function getUserById($userId){
  $id = (int)$userId;
  if($id){
    $query = "SELECT * FROM users WHERE id = {$id}";
    return dbQueryGetOne($query);
  }
}

function checkAuthUsers(){
  if($_SESSION['user_id']){
    return (bool) getUserById($_SESSION['user_id']);
  }
  return false;
}

function authenticationUser($login, $pass){
  $isAuth = -1;
  $loginValid = mysqli_real_escape_string(dbConnection(), trim($login));
  $passValid = mysqli_real_escape_string(dbConnection(), trim($pass));
  $query = "SELECT id, pass FROM users WHERE login = '{$loginValid}'";
  $user = dbQueryGetOne($query);
  if($user){
    $isAuth = 0;
    if($user['pass'] === $passValid){
      $isAuth = $user['id'];
    }
  }
  return $isAuth;
}


