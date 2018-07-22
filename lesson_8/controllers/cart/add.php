<?php
// если запрос на добавление товара в корзине
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['id']) {
  
  addOrRemoveProductInCart($_POST['id'], $_POST['amount'], 'add');
}

redirect($_SERVER['HTTP_REFERER']);