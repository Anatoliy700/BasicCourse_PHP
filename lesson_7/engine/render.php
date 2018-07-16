<?php


function render($template, array $options = [], $layoutTemplate = '') {
  $content = renderTemplate($template, $options);
  if ($layoutTemplate) {
    $content = renderTemplate("layouts/{$layoutTemplate}", ['content' => $content]);
  }
  echo $content;
}

function renderTemplate($template, $options = []) {
  extract($options);
  ob_start();
  include TEMPLATE_DIR . $template . '.php';
  return ob_get_clean();
}

