<?php

if (isAdmin()) {
  $product = [];
  if ($_GET['id']) {
    $res = getProductById($_GET['id']);
    //если данные товара получены из БД
    if ($res) {
      $product = $res;
    }
  }
  
  $message = null;
  if (isset($_SESSION['admin']['product']['message']) && $_SESSION['admin']['product']['message']) {
    $message = $_SESSION['admin']['product']['message'];
    $_SESSION['admin']['product']['message'] = null;
  }
  render('admin/product-template', [
    'content' => $product,
    'message' => $message
  ], $layoutOptions);
  
} else {
  redirect('/lk');
}



