<?php
//если пришел запрос на авторизацию с данными пользователя
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $login = trim($_POST['login']);
  $pass = trim($_POST['pass']);
  
  //если переданные данные пользователем прошли предварительную валидацию(пока тока убераем пробелы)
  if ($login && $pass) {
    //делаем запрос к БД для авторизации
    $resAuth = authenticationUser($login, $pass);
    //если в ответе пришел ID потзователя то авторизуем его и редиректим на страницу личного кабинета
    if ($resAuth && $resAuth !== -1) {
      authorizedUser($resAuth);
    } else {
      //если в ответе пришел -1 то выводим сообщение что пользоваталя с таким login не существует
      if ($resAuth) {
        $message = 'Пользователя с таким login не существует';
        //если в ответе пришел 0 то выводим сообщение что неверный пароль
      } else {
        $message = 'Неверный пароль';
      }
      $_SESSION['login']['message'] = $message;
      redirect('/login');
    }
  }
} else {
  redirect('/login');
}
