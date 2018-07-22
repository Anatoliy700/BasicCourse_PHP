<?php

if (checkAuthUsers()) {
  $user = getUserById(getUserId());
  $orders = getOrders($user['id']);
  render('lk-template', [
    'user' => $user,
    'orders' => $orders
  ], $layoutOptions);
} else {
  redirect('login');
}
