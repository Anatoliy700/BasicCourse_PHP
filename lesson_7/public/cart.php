<?php
header("Content-type: text/html; charset=UTF-8");
include __DIR__ . '/../config/constants.php';
include CONFIG_DIR . 'includeLinks.php';

session_start();

// если запрос на добавление или обновление товара в карзине
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['type']) {
  switch ($_POST['type']) {
    
    //если запрос на изменение количества товара в корзине
    case 'update':
      $update = true;
    
    //если запрос на добавление товара в корзину
    case 'add':
      $product_id = (int)$_POST['id'];
      $product_amount = (int)$_POST['amount'];
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
      }
  }
}

//если пользователь авторизован то выводим в глобальном шаблоне ссылку на выход иначе выводим ссылку на вход
if (checkAuthUsers()) {
  $layoutOptions['login'] = "<a href='login.php?type_auth=out'>Выход</a>";
} else {
  $layoutOptions['login'] = "<a href='login.php'>Вход</a>";
}

//если у пользователя есть товары в карзине то выводим их на странице
if ($_SESSION['cart'] && count($_SESSION['cart'])) {
  $arrId = [];
  foreach ($_SESSION['cart'] as $product) {
    if ($product['id'] !== null) {
      $arrId[] = $product['id'];
    }
  }
  //если удалось собрать ID товаров в корзине то делаем запрос к БД для получения детальной информации по ним
  if ($arrId) {
    $fullCartProducts = $_SESSION['cart'];
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
    
    //выводим шаблон с товарами пользователя
    render('cart-template', [
      'products' => $fullCartProducts,
      'totalPriceCart' => $totalPriceCart
    ], [
      'template' => 'main',
      'options' => $layoutOptions
    ]);
  }
} else {
  //если товаров в карзине нет, то выводим шаблон пустой карзины
  render('cart_empty-template', [], [
    'template' => 'main',
    'options' => $layoutOptions
  ]);
}