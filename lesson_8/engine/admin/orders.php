<?php

function getOrdersAll() {
  $query = "SELECT o.id,  o.amountProducts, o.total_price, so.name status, so.id id_status FROM orders o
              LEFT JOIN status_order so ON o.id_status = so.id ";
  return dbQueryGetAll($query);
}

function getStatusNames() {
  $query = "SELECT * FROM status_order";
  return dbQueryGetAll($query);
}

function changeStatus($id_order, $id_status) {
  $out = false;
  $id_order = (int)$id_order;
  $id_status = (int)$id_status;
  if ($id_order && $id_status) {
    $query = "UPDATE orders SET id_status = {$id_status} WHERE id = $id_order";
    $res = dbQuerySet($query);
    $out = $res;
  }
  
  return $out;
}