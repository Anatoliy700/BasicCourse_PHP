<?php
header("Content-type: text/html; charset=UTF-8");
include __DIR__ . '/../config/constants.php';
include CONFIG_DIR . 'includeLinks.php';

session_start();

if (checkAuthUsers()) {
  redirect('lk.php');
}

$message = '';
$layoutOptions['login'] = "<a href='login.php'>Вход</a>";
$template = 'registration-template';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['reg']) {
  $login = trim($_POST['login']);
  $pass = trim($_POST['pass']);
  $name = trim($_POST['name']);
  if ($login && $pass && $name) {
    $resReg = addNewUser($login, $name, $pass);
    
    if (!$resReg) {
      $message = 'Вы успешно зарегистрированы';
      $template = 'success_registration-template';
    } elseif ($resReg === 1062) {
      $message = 'Данный login уже существует';
    }
  }
}
render($template, ['message' => $message], [
  'template' => 'main',
  'options' => $layoutOptions
]);

