<div class="wrap-product">
  <h2><?= $product['title'] ?></h2>
  <img src="img/<?= $product['path'] ?>" alt="<?= $product['name_img'] ?>">
  <p><?= $product['description'] ?></p>
  <p>Стоимость: <?= $product['price'] ?> руб.</p>
  <form action="cart.php" method="post">
    <input type="hidden" name="type" value="add">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <input type="number" name="amount" placeholder="Количество" min="1" value="1" required>
    <input type="submit" value="Добавить в корзину">
  </form>
</div>


