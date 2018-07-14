<?php
include __DIR__ . '/../backend/config/constants.php';
include ENGINE_DIR . 'render.php';
include ENGINE_DIR . 'productsFunctions.php';
header('Content-type: text/html; charset=UTF-8');

$products = getProducts();
//var_dump($products);

render('catalog-template', [
  'arrProducts' => $products
]);

