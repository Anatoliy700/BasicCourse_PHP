<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['id_order'] && $_POST['id_status']) {
  $res = changeStatus($_POST['id_order'], $_POST['id_status']);
  $jsonOut = json_encode(
    ['result' => (int)$res]
  );
  echo $jsonOut;
} else {
  redirect('/lk');
}