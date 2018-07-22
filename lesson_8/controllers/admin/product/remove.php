<?php

if (isAdmin()) {
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['id']) {
    $id = (int)$_POST['id'];
//    $res = uploadFile($_FILES['file'], IMG_DIR, img_resize, $param);
    if ($id) {
      if (removeProduct($id)) {
        redirect("/admin/catalog");
        exit();
      }
      
    }
  }
  redirect($_SERVER['HTTP_REFERER']);
  
} else {
  redirect('/lk');
}
