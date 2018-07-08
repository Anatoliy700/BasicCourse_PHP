<?php
function dbQuery($query) {
  $db = mysqli_connect('localhost', 'root', '', 'galery');
  $respons = mysqli_query($db, $query);
  $out = false;
  if ($respons === true) {
    $out = true;
  } elseif ($respons) {
    $out = mysqli_fetch_all(mysqli_query($db, $query), MYSQLI_ASSOC);
  }
  mysqli_close($db);
  return $out;
}