<?php
header("Content-type: text/html; charset=UTF-8");
include __DIR__ . '/../config/constants.php';
include CONFIG_DIR . 'includeLinks.php';

session_start();

//если пользователь авторизован, то редиректим его на страницу личного кабинета
if (checkAuthUsers()) {
  redirect('lk.php');
}


$message = '';//для сообщения бользователю
//ссылка для добавления в глобальный шаблон
$layoutOptions['login'] = "<a href='login.php'>Вход</a>";
//имя шаблона страницы регистрации
$template = 'registration-template';

//если пришел зпрос с данными пользователя на регистрацию
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['reg']) {
  $login = trim($_POST['login']);
  $pass = trim($_POST['pass']);
  $name = trim($_POST['name']);
  //если данные пререданные пользователем прошли прошли предварительную валидацию(пока тока убераем пробелы)
  if ($login && $pass && $name) {
    //отправляем запрос к БД на добавление нового пользователя
    $resReg = addNewUser($login, $name, $pass);
    
    //если код ошибки от БД "0", то регистрация прошла успешно
    if (!$resReg) {
      //регистрация успешна, готовим сообщения для пользователя и задаем имя шаблона успешной регистрации
      $message = 'Вы успешно зарегистрированы';
      $template = 'success_registration-template';
      //если вернулся код ошибки "1062" от БД, сообщаем пользователю что предложенныйим логин занят
    } elseif ($resReg === 1062) {
      $message = 'Данный login уже существует';
    }
  }
}
//выводим шаблон исходя из результата предыдущего алгоритма
render($template, ['message' => $message], [
  'template' => 'main',
  'options' => $layoutOptions
]);

