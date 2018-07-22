<div class="wrap-lk">
  <h2>Личный кабинет</h2>
  <p><?= $user['name'] ?> , добро пожаловать в ваш личный кабинет!</p>
  <p>Ваш логин в сервисе: <?= $user['login'] ?></p>
  <div class="wrap_orders-lk">
    <h3>Ваши заказы</h3>
    <?php if ($orders): ?>
      <div id="orders" class="orders-lk">
        <?php foreach ($orders as $order): ?>
          <div class="order-lk">
            <div>
              <p>Номер заказа</p>
              <p><?= $order['id'] ?></p>
            </div>
            <div>
              <p>Товаров в заказе</p>
              <p><?= $order['amountProducts'] ?></p>
            </div>
            <div>
              <p>Стоимость заказа</p>
              <p><?= $order['total_price'] ?> руб.</p>
            </div>
            <div>
              <p>Статус заказа</p>
              <p><?= $order['status'] ?></p>
            </div>
            <div>
              <button data-id= <?= $order['id'] ?>>Отменить заказ</button>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <h4>У вас нет заказов</h4>
    <?php endif; ?>
  </div>
</div>