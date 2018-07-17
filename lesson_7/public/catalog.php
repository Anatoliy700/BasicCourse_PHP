<?php
header("Content-type: text/html; charset=UTF-8");
include __DIR__ . '/../config/constants.php';
include CONFIG_DIR . 'includeLinks.php';


$products = getProducts();

session_start();

if (checkAuthUsers()) {
  $layoutOptions['login'] = "<a href='login.php?type_auth=out'>Выход</a>";
} else {
  $layoutOptions['login'] = "<a href='login.php'>Вход</a>";
}

render('catalog-template', ['products' => $products], [
  'template' => 'main',
  'options' => $layoutOptions
]);