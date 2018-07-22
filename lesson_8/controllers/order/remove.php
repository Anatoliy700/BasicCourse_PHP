<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['id']) {
  $res = removeOrder($_POST['id']);
  $jsonOut = json_encode(
    ['result' => (int)$res]
  );
  echo $jsonOut;
} else {
  redirect('/lk');
}

