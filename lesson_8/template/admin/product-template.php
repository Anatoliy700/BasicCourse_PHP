<p><a href="catalog">Каталог</a></p>

<form class="admin_product-add" action="product/add" method="post" enctype="multipart/form-data">
  <?php if ($message): ?>
    <h3><?= $message ?></h3>
  <?php endif; ?>
  
  <?php if ($content): ?>
    <h5>Изменить данные товара</h5>
    <input type="hidden" name="id" value="<?= $content['id'] ?>">
  <?php else: ?>
    <h5>Добавить новый товар</h5>
  <?php endif; ?>
  <label for="">Название</label>
  <input type="text" name="title" placeholder="Имя продукта" required value="<?= $content['title'] ?>">
  <label for="">Описание</label>
  <textarea type="text" name="description" placeholder="Описание продукта" rows="10"
            required><?= $content['description'] ?></textarea>
  <label for="">Стоимость</label>
  <input type="number" name="price" placeholder="Стоимость" required value="<?= $content['price'] ?>">
  <label for="">Фото</label>
  <?php if ($content): ?>
    <p><img src="/img/min/<?= $content['path'] ?>" alt="<?= $content['name_img'] ?>"></p>
    <input type="file" name="file">
  <?php else: ?>
    <input type="file" name="file" required>
  <?php endif; ?>
  <?php if ($content): ?>
    <input formaction="product/update" type="submit" value="Обновить">
  <?php else: ?>
    <input type="submit" value="Добавить">
  <?php endif; ?>
  <?php if ($content): ?>
    <input type="submit" formaction="product/remove" value="Удалить товар">
  <?php endif; ?>

</form>