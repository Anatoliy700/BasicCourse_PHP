<?php


function autoload($dir) {
  $engine_files = array_diff(scandir($dir), array('..', '.'));
  
  foreach ($engine_files as $file) {
    $filePath = $dir . DS . $file;
    if (is_dir($filePath)) {
      autoload($filePath);
    }
    if (substr($file, -4) === '.php') {
      include_once $filePath;
    }
  }
}

autoload(ENGINE_DIR);
autoload(VENDOR_DIR);