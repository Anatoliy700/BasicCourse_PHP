<div class="wrap-cart">
  <h1>Корзина</h1>
  <div class="wrap-cart-products">
    <?php foreach ($products as $product): ?>
      <div class="cart-product">
        <h3><?= $product['details']['title'] ?></h3>
        <div>
          <img src="img/min/<?= $product['details']['path'] ?>" alt="<?= $product['details']['name_img'] ?>">
        </div>
        <form method="post">
          <input type="hidden" name="type" value="update">
          <input type="hidden" name="id" value="<?= $product['id'] ?>">
          <input type="number" name="amount" min="1" value="<?= $product['amount'] ?>" required>
          <input type="submit" value="Изменить количество">
        </form>
        <div class="cart-product-total-price">
          Стоимость: <?= $product['total_price'] ?> руб.
        </div>
        <form method="post">
          <input type="hidden" name="type" value="remove">
          <input type="hidden" name="id" value="<?= $product['id'] ?>">
          <input type="submit" value="Удалить товар">
        </form>
      </div>
    <?php endforeach; ?>
  </div>
  <p>Общая стоимость: <?= $totalPriceCart ?> руб.</p>
</div>