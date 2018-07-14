<?php
require_once ENGINE_DIR . 'db.php';

function getProducts() {
  $query = 'SELECT id, title, price, image_min FROM products';
  return dbQueryGetAll($query);
}

function getProductById($param) {
  $id = (int)$param;
  $query = "SELECT id, category, title, description, price, image_max, options FROM products WHERE id = {$id}";
  return dbQueryGetOne($query);
}
