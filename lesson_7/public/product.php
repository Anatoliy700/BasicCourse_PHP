<?php
header("Content-type: text/html; charset=UTF-8");
include __DIR__ . '/../config/constants.php';
include CONFIG_DIR . 'includeLinks.php';

if ($_GET['id']) {
  $product = getProductById($_GET['id']);
  if ($product) {
    render('product-template', ['product' => $product], 'main');
  } else {
    redirect('catalog.php');
  }
} else {
  redirect('catalog.php');
}