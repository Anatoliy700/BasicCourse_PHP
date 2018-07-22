<?php
//var_dump($_SESSION);exit();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['cart']['product']) && count($_SESSION['cart']['product'])) {
  if (addOrder($_SESSION['cart'], $_SESSION['user'])) {
    $_SESSION['cart'] = null;
    $_SESSION['message'] = "Ваш заказ успешно отправлен";
    redirect('/cart');
  }
} else {
  redirect($_SERVER['HTTP_REFERER']);
}