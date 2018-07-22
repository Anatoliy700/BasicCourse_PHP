<?php

//если пользователь авторизован то выводим в глобальном шаблоне ссылку на выход иначе выводим ссылку на вход

$layoutOptions['login'] = checkAuthUsers() ? $linkAuthUserOut : $linkAuthUserIn;

if ($_SESSION['message']) {
  $message = $_SESSION['message'];
  $_SESSION['message'] = null;
}
$productOfCart = '';
if (isset($_SESSION['cart']['product']) && count($_SESSION['cart']['product'])) {
  $productOfCart = getProductOfCart($_SESSION['cart']['product']);
  $_SESSION['cart']['totalPrice'] = $productOfCart['totalPrice'];
  $_SESSION['cart']['totalAmountProducts'] = $productOfCart['totalAmountProducts'];
}

//выводим шаблон с товарами пользователя
render('cart-template', [
  'cart' => $productOfCart,
  'message' => $message
], $layoutOptions);
