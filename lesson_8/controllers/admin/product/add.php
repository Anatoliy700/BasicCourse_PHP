<?php

if (isAdmin()) {
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $price = (int)$_POST['price'];
    $fileName = null;
    if (isset($_FILES['file']) && $_FILES['file']['name'] && $_FILES['file']['size'] > 0) {
      $param = include CONFIG_DIR . 'images.php';
      $res = uploadFile($_FILES['file'], IMG_DIR, img_resize, $param);
      if ($res) {
        $fileName = $res;
      }
    }
    if ($title && $description && $price && $fileName) {
      if ($id = addProduct($title, $description, $price, $fileName)) {
        $_SESSION['admin']['product']['message'] = 'Товар успешно добавлен';
        redirect("/admin/product?id={$id}");
        exit();
      }
      redirect("/admin/product");
      exit();
    }
  }
  redirect($_SERVER['HTTP_REFERER']);
  
} else {
  redirect('/lk');
}
