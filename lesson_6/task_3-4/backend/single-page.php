<?php
include __DIR__ . '/../backend/config/constants.php';
include ENGINE_DIR . 'render.php';
include ENGINE_DIR . 'productsFunctions.php';
header('Content-type: text/html; charset=UTF-8');

if ($_GET['id']) {
  
  
  $product = getProductById($_GET['id']);
//var_dump($products);
  
  render('single-page-template', [
    'product' => $product,
    'options' => json_decode($product['options'], true)
  ]);
}
