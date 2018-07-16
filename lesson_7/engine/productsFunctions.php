<?php
require_once ENGINE_DIR . 'db.php';

function getProducts() {
  $query = 'SELECT p.id, p.title, p.price, i.path FROM products p
              INNER JOIN images i ON p.id = i.product_id';
  return dbQueryGetAll($query);
}

function getProductById($param) {
  $id = (int)$param;
  $query = "SELECT p.id, p.title, p.description, p.price, i.name name_img, i.path FROM products p
              INNER JOIN images i ON p.id = i.product_id
              WHERE p.id = {$id}";
  return dbQueryGetOne($query);
}

function getProductsById($param) {
  $arrId = array_filter($param, function ($id) {
    return (int)$id;
  });
  
  $query = "SELECT p.id, p.title, p.price, i.name name_img, i.path FROM products p
              INNER JOIN images i ON p.id = i.product_id
              WHERE p.id = ";
  foreach ($arrId as $key => $id) {
    if (!$key) {
      $query .= $id;
    } else {
      $query .= " OR p.id = {$id}";
    }
  }
  
  return dbQueryGetAll($query);
}
