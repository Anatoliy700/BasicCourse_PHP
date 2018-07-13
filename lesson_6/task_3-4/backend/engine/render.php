<?php
function render($template, array $options = []){
  extract($options);
  include TEMPLATE_DIR . $template . '.php';
}