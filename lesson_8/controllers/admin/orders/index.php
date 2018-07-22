<?php

if (isAdmin()) {
  $orders = getOrdersAll();
  $statusNames = getStatusNames();
  render('admin/orders-template', [
    'statuses' => $statusNames,
    'orders' => $orders
  ], $layoutOptions);
  
} else {
  redirect('/lk');
}


