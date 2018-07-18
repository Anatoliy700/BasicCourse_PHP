<?php
header("Content-type: text/html; charset=UTF-8");
include __DIR__ . '/../config/constants.php';
include CONFIG_DIR . 'includeLinks.php';

session_start();

// если запрос на добавление, обновление или удаление товара в карзине
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['type']) {
  
  addOrRemoveProductInCart($_POST['id'], $_POST['amount'], $_POST['type']);
}

//если пользователь авторизован то выводим в глобальном шаблоне ссылку на выход иначе выводим ссылку на вход
if (checkAuthUsers()) {
  $layoutOptions['login'] = "<a href='login.php?type_auth=out'>Выход</a>";
} else {
  $layoutOptions['login'] = "<a href='login.php'>Вход</a>";
}

//если у пользователя есть товары в карзине то выводим их на странице
if ($_SESSION['cart'] && count($_SESSION['cart'])) {
  
  $productOfCart = getProductOfCart($_SESSION['cart']);
  
  if ($productOfCart) {
    //выводим шаблон с товарами пользователя
    render('cart-template', [
      'products' => $productOfCart['products'],
      'totalPriceCart' => $productOfCart['totalPrice']
    ], [
      'template' => 'main',
      'options' => $layoutOptions
    ]);
  }
} else {
  //если товаров в карзине нет, то выводим шаблон пустой карзины
  render('cart_empty-template', [], [
    'template' => 'main',
    'options' => $layoutOptions
  ]);
}