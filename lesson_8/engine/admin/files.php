<?php

function uploadFile($uploadFile, $distance, $callback = null, $paramCallback = null) {
  $destinationFile = $distance . '/' . $uploadFile['name'];
  $res = move_uploaded_file(
    $uploadFile['tmp_name'], $destinationFile
  );
  if ($callback) {
    $callback($destinationFile, $distance . $paramCallback['pathMinImage'] . '/'. $uploadFile['name'], $paramCallback['imageWidth'], $paramCallback['imageHeight']);
  }
  return $res ? $uploadFile['name'] : $res;
}


function removeFiles(array $arrFiles){
  foreach ($arrFiles as $file) {
    unlink(IMG_DIR . $file['path']);
    unlink(IMG_DIR . 'min/' . $file['path']);
  }
}