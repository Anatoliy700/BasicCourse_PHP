<?php
include __DIR__ . '/../backend/config/constants.php';
include ENGINE_DIR . 'commentsFunctions.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $typeRequest = $_GET['type'] ? $_GET['type'] : null;
  $response = null;
  switch ($typeRequest) {
    case 'get':
      $response = getComments();
      break;
    case 'add':
      $response = addComments($_POST);
      
      break;
    case 'approved':
      $response = approvedComments($_POST['id_comment']);
      break;
    case 'remove':
      $response = removeComments($_POST['id_comment']);
      break;
  }
  echo $response;
}