<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/main.css">
  <title>PHP_1 Shop</title>
</head>
<body>
<p>
  <a href="catalog.php">Каталог</a>&nbsp;&nbsp;
  <a href="cart.php">Корзина</a>&nbsp;&nbsp;
  <a href="lk.php">Личный кабинет</a>&nbsp;&nbsp;
  <?=$options['login']?>
</p>
<p></p>
<?= $content ?>
</body>
</html>