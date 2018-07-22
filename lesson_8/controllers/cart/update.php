<?php
// если запрос на обновление товара в корзине
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['id']) {
  
  addOrRemoveProductInCart($_POST['id'], $_POST['amount'], 'update');
}

redirect($_SERVER['HTTP_REFERER']);