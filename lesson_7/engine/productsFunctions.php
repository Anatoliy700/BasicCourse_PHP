<?php
require_once ENGINE_DIR . 'db.php';

/**
 * Возвращает все товары из БД
 * @return array|bool|int|mysqli_result|null
 */
function getProducts() {
  $query = 'SELECT p.id, p.title, p.price, i.path FROM products p
              INNER JOIN images i ON p.id = i.product_id';
  return dbQueryGetAll($query);
}

/**
 * Возвращает товар из БД по ID
 * @param int $param ID товара
 * @return array|bool|int|mixed|mysqli_result|null
 */
function getProductById($param) {
  $id = (int)$param;
  $query = "SELECT p.id, p.title, p.description, p.price, i.name name_img, i.path FROM products p
              INNER JOIN images i ON p.id = i.product_id
              WHERE p.id = {$id}";
  return dbQueryGetOne($query);
}

/**
 * Возвращает выборку товаров из БД по переданным ID товаров
 * @param array $param массив ID товаров
 * @return array|bool|int|mysqli_result|null
 */
function getProductsById($param) {
  $arrId = array_filter($param, function ($id) {
    return (int)$id;
  });
  $idStr = implode(',', $arrId);
  
  $query = "SELECT p.id, p.title, p.price, i.name name_img, i.path FROM products p
              INNER JOIN images i ON p.id = i.product_id
              WHERE p.id in ({$idStr}) ";
  return dbQueryGetAll($query);
}
