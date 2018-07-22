<?php

function addOrder($cart, $user) {
//  var_dump($cart);
  $out = false;
  $idUser = (int)$user['id'];
  $totalPrice = (int)$cart['totalPrice'];
  $totalAmountProducts = (int)$cart['totalAmountProducts'];
  $query = "INSERT INTO orders (id_user, amountProducts, total_price) VALUES ({$idUser}, {$totalAmountProducts}, {$totalPrice})";
  $idOrder = dbQuerySet($query, 'id');
  if ($idOrder) {
    foreach ($cart['product'] as $product) {
      $idProduct = (int)$product['id'];
      $amountProduct = (int)$product['amount'];
      if ($idProduct && $totalPrice && $amountProduct) {
        $query = "INSERT INTO order_product (id_product, amount, id_order)
                  VALUES ({$idProduct}, {$amountProduct}, {$idOrder})";
        $out = dbQuerySet($query);
        if (!$out) {
          break;
        }
      }
    }
  }
  return $out;
}

function getOrders($id_user) {
  $id_user = (int)$id_user;
  if ($id_user) {
    $query = "SELECT o.id,  o.amountProducts, o.total_price, so.name status FROM orders o
              LEFT JOIN status_order so ON o.id_status = so.id WHERE o.id_user = {$id_user}";
    return dbQueryGetAll($query);
  }
}

function removeOrder($id){
  $id_order = (int)$id;
  $out = false;
  if($id_order){
    $query = "DELETE FROM orders WHERE id = {$id_order}";
    $res = dbQuerySet($query);
    $out = $res;
  }
  return $out;
}