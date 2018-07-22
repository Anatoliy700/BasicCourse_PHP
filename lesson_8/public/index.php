<?php
header("Content-type: text/html; charset=UTF-8");
include __DIR__ . '/../config/constants.php';
include ENGINE_DIR . 'autoload.php';

session_start();

$linkAuthUserIn = "<a href='../login'>Вход</a>";
$linkAuthUserOut = "<a href='../login/out'>Выход</a>";
$linkRegistrationUser = "<a href='../registration'>Регистрация</a>";
$linkAdminUser = "<a href='../admin'>Админка</a>";

$linkAuthUser = checkAuthUsers() ? $linkAuthUserOut : $linkAuthUserIn;

$layoutOptions = [
  'template' => 'main',
  'options' => [
    'admin' => $linkAdminUser,
    'login' => $linkAuthUser
  ]
];


if (!$path = preg_replace(["#^/#", "#[?].*#"], "", $_SERVER['REQUEST_URI'])) {
  $path = "catalog";
}
$parts = explode("/", $path);
if ($parts[0] === 'admin') {
  $controller = $parts[0] . DS . $parts[1];
  $action = $parts[2] ?? "index";
  
  $pageName = CONTROLLERS_DIR . $controller . DS . $action . ".php";
  
} else {
  
  
  $controller = $parts[0];
  $action = $parts[1] ?? "index";
  
  $pageName = CONTROLLERS_DIR . $controller . DS . $action . ".php";
}
if (file_exists($pageName)) {
  include $pageName;
} else {
  echo "Такой страницы нет!";
}
