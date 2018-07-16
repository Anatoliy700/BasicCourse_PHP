<?php
header("Content-type: text/html; charset=UTF-8");
include __DIR__ . '/../config/constants.php';
include CONFIG_DIR . 'includeLinks.php';


$products = getProducts();

render('catalog-template', ['products' => $products], 'main');