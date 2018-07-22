<div class="wrap_orders-adm">
  <h3>Заказы</h3>
  <?php if ($orders): ?>
    <div id="orders" class="orders-adm">
      <?php foreach ($orders as $order): ?>
        <div class="order-adm">
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
            <select name="status" id="status_order" data-id="<?= $order['id'] ?>">
              <?php foreach ($statuses as $status): ?>
                <option value="<?= $status['id'] ?>"
                  <?php if ($status['id'] === $order['id_status']): ?>
                    selected
                  <?php endif; ?>
                ><?= $status['name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div>
            <button data-id= <?= $order['id'] ?>>Отменить заказ</button>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <h4>На днанный момент заказов нет</h4>
  <?php endif; ?>
</div>
