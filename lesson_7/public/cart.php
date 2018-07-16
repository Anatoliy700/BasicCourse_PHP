<?php
header("Content-type: text/html; charset=UTF-8");
include __DIR__ . '/../config/constants.php';
include CONFIG_DIR . 'includeLinks.php';

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['type']) {
  switch ($_POST['type']) {
    case 'update':
      $update = true;
    case 'add':
      $product_id = (int)$_POST['id'];
      $product_amount = (int)$_POST['amount'];
      if ($product_id && $product_amount) {
        $arrKey = false;
        if ($_SESSION['cart']) {
          foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] === $product_id) {
              $arrKey = $key;
              break;
            }
          }
        }
        if ($arrKey !== false) {
          if ($update) {
            $_SESSION['cart'][$arrKey]['amount'] = $product_amount;
          } else {
            $_SESSION['cart'][$arrKey]['amount'] += $product_amount;
          }
        } else {
          $_SESSION['cart'][] = ['id' => $product_id, 'amount' => $product_amount];
        }
      }
      break;
    case 'remove':
      $product_id = (int)$_POST['id'];
      if ($product_id) {
        foreach ($_SESSION['cart'] as $key => $item) {
          if ($item['id'] === $product_id) {
            array_splice($_SESSION['cart'], $key, 1);
            break;
          }
        }
      }
  }
}

if ($_SESSION['cart'] && count($_SESSION['cart'])) {
  $arrId = [];
  foreach ($_SESSION['cart'] as $product) {
    if ($product['id'] !== null) {
      $arrId[] = $product['id'];
    }
  }
  if ($arrId) {
    $fullCartProducts = $_SESSION['cart'];
    $cartProductsDb = getProductsById($arrId);
    $totalPriceCart = 0;
    foreach ($fullCartProducts as $key => $item) {
      foreach ($cartProductsDb as $productDb) {
        if ($item['id'] == $productDb['id']) {
          $fullCartProducts[$key]['details'] = $productDb;
          $fullCartProducts[$key]['total_price'] = $productDb['price'] * $item['amount'];
          $totalPriceCart += $fullCartProducts[$key]['total_price'];
        }
      }
    }
//    var_dump($fullCartProducts);
    render('cart-template', [
      'products' => $fullCartProducts,
      'totalPriceCart' => $totalPriceCart
    ], 'main');
  }
} else {
  render('cart_empty-template', [], 'main');
}