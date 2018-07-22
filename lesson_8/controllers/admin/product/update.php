<?php

if (isAdmin()) {
  
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['id']) {
    $id = (int)$_POST['id'];
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
    if ($id && $title && $description && $price) {
      if (updateProduct($id, $title, $description, $price, $fileName)) {
        $_SESSION['admin']['product']['message'] = 'Данные успешно обновлены';
      }
      redirect("/admin/product?id={$id}");
      exit();
    }
  }
  redirect($_SERVER['HTTP_REFERER']);
  
} else {
  redirect('/lk');
}
