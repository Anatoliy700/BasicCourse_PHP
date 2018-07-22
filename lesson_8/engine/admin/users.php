<?php

function isAdmin() {
  if (checkAuthUsers()) {
    if (!isset($_SESSION['user']['access'])) {
      $id = getUserId();
      $query = "SELECT access FROM users WHERE id = {$id}";
      $res = dbQueryGetOne($query);
      if ($res !== null) {
        $_SESSION['user']['access'] = $res['access'];
      }
    }
    return $_SESSION['user']['access'];
  }
  return false;
}
