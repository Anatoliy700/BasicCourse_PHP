<?php
header("Content-type: text/html; charset=UTF-8");
include __DIR__ . '/../config/constants.php';
include CONFIG_DIR . 'includeLinks.php';

//получаем все продукты из БД
$products = getProducts();

session_start();

//если пользователь авторизован то выводим в глобальном шаблоне ссылку на выход иначе выводим ссылку на вход
if (checkAuthUsers()) {
  $layoutOptions['login'] = "<a href='login.php?type_auth=out'>Выход</a>";
} else {
  $layoutOptions['login'] = "<a href='login.php'>Вход</a>";
}

//выводим шаблон заполненный товарами из БД
render('catalog-template', ['products' => $products], [
  'template' => 'main',
  'options' => $layoutOptions
]);