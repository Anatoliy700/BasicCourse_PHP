<?php
require_once ENGINE_DIR . 'db.php';

/**
 * Возвращает данные пользавателя из БД по его ID
 * @param int $userId ID пользователя
 * @return array|bool|int|mixed|mysqli_result|null
 */
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

/**
 * Добавляет нового пользователя в БД и возвращает код ошибки или 0 если успешно
 * @param string $login login нового пользователя
 * @param string $name имя нового пользователя
 * @param string $pass пароль нового пользователя
 * @return bool|int|mysqli_result
 */
function addNewUser($login, $name, $pass) {
  $loginValid = mysqli_real_escape_string(dbConnection(), trim($login));
  $nameValid = mysqli_real_escape_string(dbConnection(), trim($name));
  $passValid = mysqli_real_escape_string(dbConnection(), trim($pass));
  $hashPass = password_hash($passValid, PASSWORD_DEFAULT);
  $query = "INSERT INTO users (login, name, pass) VALUES ('{$loginValid}', '{$nameValid}', '{$hashPass}')";
  $res = dbQuerySet($query, true);
  return $res;
}

/**
 * Проверяет авторизован ли пользователь
 * @return bool
 */
function checkAuthUsers() {
  if ($_SESSION['user_id'] && $_SESSION['auth']) {
    return $_SESSION['auth'];
  }
  return false;
}

/**
 * Произвдить аутентификацию пользователя
 * @param string $login login пользователя
 * @param string $pass пароль пользователя
 * @return int возвращает -1 если пользователь с таки login не найден, 0 если найден но парольне верный,
 * ID пользователя если аутентификация прошла успешно
 */
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


