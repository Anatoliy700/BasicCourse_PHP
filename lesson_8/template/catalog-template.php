
<h2>Товары</h2>
<div class="wrap-products">
  <?php foreach ($products as $product): ?>
    <div class="product">
      <a href="product?id=<?= $product['id'] ?>">
        <div>
          <h3><?= $product['title'] ?></h3>
          <img src="/img/min/<?= $product['path'] ?>" alt="">
          <p><?= $product['description'] ?></p>
          <p>Стоимость: <?= $product['price'] ?> руб.</p>
        </div>
      </a>
    </div>
  <?php endforeach; ?>
</div>