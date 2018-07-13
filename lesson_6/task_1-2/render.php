<?php
function render($template, array $options){
  extract($options);
  include ROOT_DIR . $template . '.php';
}