<?php
// если запрос на удаление товара в корзине
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['id']) {
  
  addOrRemoveProductInCart($_POST['id'], $_POST['amount'], 'remove');
}

redirect($_SERVER['HTTP_REFERER']);