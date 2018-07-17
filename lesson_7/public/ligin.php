<?php
header("Content-type: text/html; charset=UTF-8");
include __DIR__ . '/../config/constants.php';
include CONFIG_DIR . 'includeLinks.php';

if (checkAuthUsers()) {
  redirect('lk.php');
}
$errorMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['type_auth']) {
  if ($_POST['type_auth'] === 'in') {
    $login = trim($_POST['login']);
    $pass = trim($_POST['pass']);
    if ($login && $pass) {
      $resAuth = authenticationUser($login, $pass);
      if ($resAuth && $resAuth !== -1) {
        session_start();
        $_SESSION['user_id'] = $resAuth;
        redirect('lk.php');
      } else {
        if ($resAuth) {
          $errorMessage = 'Пользователя с таким login не существует';
        } else {
          $errorMessage = 'Неверный пароль';
        }
      }
    }
  } elseif ($_POST['type_auth'] === 'out') {
    //разлогиниваем пользователя
    redirect('login.php');
  }
}

render('login-template', ['errorMessage' => $errorMessage], 'main');