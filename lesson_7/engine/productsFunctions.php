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

/**
 * @param $id
 * @param $amount
 * @param $type
 * @return bool
 */
function addOrRemoveProductInCart($id, $amount, $type) {
  switch ($type) {
    
    //если запрос на изменение количества товара в корзине
    case 'update':
      $update = true;
    
    //если запрос на добавление товара в корзину
    case 'add':
      $product_id = (int)$id;
      $product_amount = (int)$amount;
      if ($product_id && $product_amount) {
        $arrKey = false;
        
        //если в корзине уже есть товар
        if ($_SESSION['cart']) {
          foreach ($_SESSION['cart'] as $key => $item) {
            //проверяем нет ли уже добавляемого товара в карзине и если есть то только увеличиваем количество
            if ($item['id'] === $product_id) {
              $arrKey = $key;
              break;
            }
          }
        }
        //если добавляемые товар уже присутсвует в карзине
        if ($arrKey !== false) {
          
          //если пришел запрос на обновление количества
          if ($update) {
            $_SESSION['cart'][$arrKey]['amount'] = $product_amount;
          } else {
            $_SESSION['cart'][$arrKey]['amount'] += $product_amount;
          }
          //если добавляемые товар не присутсвует в карзине
        } else {
          $_SESSION['cart'][] = ['id' => $product_id, 'amount' => $product_amount];
        }
        return true;
      }
      break;
    //если пришел запрос на удаление товара из карзины
    case 'remove':
      $product_id = (int)$_POST['id'];
      if ($product_id) {
        foreach ($_SESSION['cart'] as $key => $item) {
          if ($item['id'] === $product_id) {
            array_splice($_SESSION['cart'], $key, 1);
            break;
          }
        }
        return true;
      }
    
  }
  return false;
}


function getProductOfCart($arrProductCart) {
  $out = false;
  $arrId = [];
  foreach ($arrProductCart as $product) {
    if ($product['id'] !== null) {
      $arrId[] = $product['id'];
    }
  }
  //если удалось собрать ID товаров в корзине то делаем запрос к БД для получения детальной информации по ним
  if ($arrId) {
    $fullCartProducts = $arrProductCart;
    $cartProductsDb = getProductsById($arrId);
    $totalPriceCart = 0;
    foreach ($fullCartProducts as $key => $item) {
      foreach ($cartProductsDb as $productDb) {
        if ($item['id'] == $productDb['id']) {
          $fullCartProducts[$key]['details'] = $productDb;
          $fullCartProducts[$key]['total_price'] = $productDb['price'] * $item['amount'];
          $totalPriceCart += $fullCartProducts[$key]['total_price'];
        }
      }
    }
    $out['totalPrice'] = $totalPriceCart;
    $out['products'] = $fullCartProducts;
  }
  return $out;
}