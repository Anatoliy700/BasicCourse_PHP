<?php


function render($template, array $options = [], $layoutOptions = []) {
  $content = renderTemplate($template, $options);
  if ($layoutOptions) {
    $content = renderTemplate("layouts/{$layoutOptions['template']}", [
      'content' => $content,
      'options' => $layoutOptions['options']
    ]);
  }
  echo $content;
}

function renderTemplate($template, $options = []) {
  extract($options);
  ob_start();
  include TEMPLATE_DIR . $template . '.php';
  return ob_get_clean();
}

