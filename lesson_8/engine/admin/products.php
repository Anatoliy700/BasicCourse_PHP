<?php

function updateProduct($id, $title, $description, $price, $fileName = null) {
  $idValid = (int)$id;
  $titleValid = mysqli_real_escape_string(dbConnection(), trim($title));
  $descriptionValid = mysqli_real_escape_string(dbConnection(), trim($description));
  $priceValid = (int)$price;
  if ($fileName) {
    $query = "UPDATE products p, images i
              SET p.title = '{$titleValid}', p.description = '{$descriptionValid}' , p.price  = {$priceValid},
                i.name = '{$titleValid}', i.path = '{$fileName}'
              WHERE p.id = {$idValid}
              AND p.id = i.product_id";
  } else {
    $query = "UPDATE products p
              SET p.title = '{$titleValid}', p.description = '{$descriptionValid}' , p.price  = {$priceValid}
              WHERE p.id = {$idValid}";
  }
  $res = dbQuerySet($query);
  return $res;
}

function addProduct($title, $description, $price, $fileName = null) {
  $id = null;
  $titleValid = mysqli_real_escape_string(dbConnection(), trim($title));
  $descriptionValid = mysqli_real_escape_string(dbConnection(), trim($description));
  $priceValid = (int)$price;
  if ($fileName) {
    $query = "INSERT INTO products (title, description, price)
              VALUES ('{$titleValid}', '{$descriptionValid}', $priceValid)";
    $id = dbQuerySet($query, 'id');
    $query = "INSERT INTO images (name ,path, product_id)
                    VALUES ('{$titleValid}', '{$fileName}', '{$id}')";
    dbQuerySet($query);
  } else {
    $query = "INSERT INTO products (title, description, price)
              VALUES ('{$titleValid}', '{$descriptionValid}', $priceValid)";
    $id = dbQuerySet($query, 'id');
  }
  return $id;
  
}

function removeProduct($id) {
  $idValid = (int)$id;
  $arrFileNameImg = dbQueryGetAll("SELECT path FROM images WHERE product_id = {$idValid}");
//  var_dump($arrFileNameImg);
  
  $query = "DELETE FROM products WHERE id = {$idValid}";
  $res = dbQuerySet($query);
  if ($res) {
    removeFiles($arrFileNameImg);
  }
  return $res;
}