<?php
header("Content-type: text/html; charset=UTF-8");
include __DIR__ . '/../config/constants.php';
include CONFIG_DIR . 'includeLinks.php';

session_start();
if (checkAuthUsers()) {
  $user = getUserById($_SESSION['user_id']);
  $layoutOptions['login'] = "<a href='login.php?type_auth=out'>Выход</a>";
  
  render('lk-template', ['user' => $user], [
    'template' => 'main',
    'options' => $layoutOptions
  ]);
} else {
  redirect('login.php');
}
