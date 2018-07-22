<?php


//если пользователь авторизован, то редиректим его на страницу личного кабинета
if (checkAuthUsers()) {
  redirect('/lk');
}

$message = '';

//если была ошибка авторизации
if($_SESSION['login'] && $_SESSION['login']['message']){
  $message = $_SESSION['login']['message'];
  $_SESSION['login']['message'] = '';
}


//ссылка для вывода в главном шаблоне
$layoutOptions['options']['login'] = $linkRegistrationUser;
//выводим шаблон страницы авторизации
render('login-template', ['message' => $message], $layoutOptions);

