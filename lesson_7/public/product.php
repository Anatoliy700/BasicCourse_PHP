<?php
header("Content-type: text/html; charset=UTF-8");
include __DIR__ . '/../config/constants.php';
include CONFIG_DIR . 'includeLinks.php';

session_start();

//если пришел запрос с ID товара то получаем товар из БД по ID и если он существует,
// то выводим заполненный шаблон катрочи товара
if ($_GET['id']) {
  $product = getProductById($_GET['id']);
  //если данные товара получены из БД
  if ($product) {
    
    //если пользователь авторизован то выводим в глобальном шаблоне ссылку на выход иначе выводим ссылку на вход
    if (checkAuthUsers()) {
      $layoutOptions['login'] = "<a href='login.php?type_auth=out'>Выход</a>";
    } else {
      $layoutOptions['login'] = "<a href='login.php'>Вход</a>";
    }
    //выводим шаблон карточки товара
    render('product-template', ['product' => $product], [
      'template' => 'main',
      'options' => $layoutOptions
    ]);
    //если товар не найден в БД, делаем редирект на каталог
  } else {
    redirect('catalog.php');
  }
  //если в пришедшем зпросе нет ID товара то, делаем редирект на каталог
} else {
  redirect('catalog.php');
}