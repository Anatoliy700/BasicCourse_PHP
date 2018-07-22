<?php

//если пользователь авторизован, то редиректим его на страницу личного кабинета
if (checkAuthUsers()) {
  redirect('/lk');
}


$message = '';//для сообщения пользователю
//ссылка для добавления в глобальный шаблон
$layoutOptions['login'] = $linkAuthUserIn;
//имя шаблона страницы регистрации
$template = 'registration-template';

if ($_SESSION['registration'] && $_SESSION['registration']['message']) {
  $message = $_SESSION['registration']['message'];
  $_SESSION['registration']['message'] = '';
}


//выводим шаблон исходя из результата предыдущего алгоритма
render($template, ['message' => $message], $layoutOptions);

