<?php
header("Content-type: text/html; charset=UTF-8");
include __DIR__ . '/../config/constants.php';
include CONFIG_DIR . 'includeLinks.php';

if ($_GET['id']) {
  $product = getProductById($_GET['id']);
  if ($product) {
    session_start();
    
    if (checkAuthUsers()) {
      $layoutOptions['login'] = "<a href='login.php?type_auth=out'>Выход</a>";
    } else {
      $layoutOptions['login'] = "<a href='login.php'>Вход</a>";
    }
    render('product-template', ['product' => $product], [
      'template' => 'main',
      'options' => $layoutOptions
    ]);
  } else {
    redirect('catalog.php');
  }
} else {
  redirect('catalog.php');
}