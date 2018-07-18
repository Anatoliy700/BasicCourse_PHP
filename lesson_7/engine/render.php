<?php

/**
 * выводит в поток динамически сфорированный шаблон обернутый в статический, глобальный шаблон
 * @param string $template динамически формируемый шаблон
 * @param array $options массив с подготовленными данными для динамического шаблона
 * @param array $layoutOptions массив в котором передается имя статического шаблона
 * с возможностью передать данные в статический шаблон
 */
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

/**
 * вормируем динамический шаблон и всавляет в него данные
 * @param string $template динамически формируемый шаблон
 * @param array $options массив с подготовленными данными для динамического шаблона
 * @return string
 */
function renderTemplate($template, $options = []) {
  extract($options);
  ob_start();
  include TEMPLATE_DIR . $template . '.php';
  return ob_get_clean();
}

