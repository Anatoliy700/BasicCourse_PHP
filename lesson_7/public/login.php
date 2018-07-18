<?php
header("Content-type: text/html; charset=UTF-8");
include __DIR__ . '/../config/constants.php';
include CONFIG_DIR . 'includeLinks.php';

session_start();

//если пришол запрос на выход пользователя из системы
if ($_GET['type_auth'] && $_GET['type_auth'] === 'out') {
  $_SESSION['auth'] = false;
  redirect($_SERVER['HTTP_REFERER']);
}

//если пользователь авторизован, то редиректим его на страницу личного кабинета
if (checkAuthUsers()) {
  redirect('lk.php');
}

$errorMessage = ''; //переменная для ошибки авторизации

//если пришел запрос на авторизацию с данными пользователя
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['type_auth']) {
  $login = trim($_POST['login']);
  $pass = trim($_POST['pass']);
  
  //если переданные данные пользователем прошли предварительную валидацию(пока тока убераем пробелы)
  if ($login && $pass) {
    //делаем запрос к БД для авторизации
    $resAuth = authenticationUser($login, $pass);
    //если в ответе пришел ID потзователя то авторизуем его и редиректим на страницу личного кабинета
    if ($resAuth && $resAuth !== -1) {
      $_SESSION['user_id'] = $resAuth;
      $_SESSION['auth'] = true;
      redirect('lk.php');
    } else {
      //если в ответе пришел -1 то выводим сообщение что пользоваталя с таким login не существует
      if ($resAuth) {
        $errorMessage = 'Пользователя с таким login не существует';
        //если в ответе пришел 0 то выводим сообщение что неверный пароль
      } else {
        $errorMessage = 'Неверный пароль';
      }
    }
  }
}
//ссылка для вывода в главном шаблоне
$layoutOptions['login'] = "<a href='registration.php'>Регистрация</a>";
//выводим шаблон страницы авторизации
render('login-template', ['errorMessage' => $errorMessage], [
  'template' => 'main',
  'options' => $layoutOptions
]);

