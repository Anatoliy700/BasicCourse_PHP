<?php
header("Content-type: text/html; charset=UTF-8");
include __DIR__ . '/../config/constants.php';
include CONFIG_DIR . 'includeLinks.php';

session_start();

if ($_GET['type_auth'] && $_GET['type_auth'] === 'out') {
  $_SESSION['auth'] = false;
  redirect($_SERVER['HTTP_REFERER']);
}

if (checkAuthUsers()) {
  redirect('lk.php');
}
$errorMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['type_auth']) {
  $login = trim($_POST['login']);
  $pass = trim($_POST['pass']);
  if ($login && $pass) {
    $resAuth = authenticationUser($login, $pass);
    if ($resAuth && $resAuth !== -1) {
      $_SESSION['user_id'] = $resAuth;
      $_SESSION['auth'] = true;
      redirect('lk.php');
    } else {
      if ($resAuth) {
        $errorMessage = 'Пользователя с таким login не существует';
      } else {
        $errorMessage = 'Неверный пароль';
      }
    }
  }
}
$layoutOptions['login'] = "<a href='registration.php'>Регистрация</a>";
render('login-template', ['errorMessage' => $errorMessage], [
  'template' => 'main',
  'options' => $layoutOptions
]);

