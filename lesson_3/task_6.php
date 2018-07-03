<?php
header('Content-type: text/html; charset=UTF-8');
/*6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.*/

function menu($menuItems) {
  $html = '<ul>';
  for ($li = 0; $li < count($menuItems); $li++) {
    $html .= "<li><a href='#'>{$menuItems[$li]}</a></li>";
  }
  $html .= '</ul>';
  return $html;
}

$menuItems = ["Главная", "Категории", "Акции", "О нас", "Контакты"];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task_6</title>
    <style>
        body {
            margin: 0;
        }

        header {
            height: 100px;
            background-color: #03a9f44d;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        ul {
            width: 500px;
            margin: 0 auto;
            padding: 0;
            list-style-type: none;
            display: flex;
            justify-content: space-around;
        }

        a {
            text-decoration: none;
        }

        main {
            height: 200px;
            background-color: #603a0c36;
        }

        footer {
            height: 100px;
            background-color: #1c1c32a1;
        }
    </style>
</head>
<body>
<header>
  <? echo menu($menuItems) ?>
</header>
<main></main>
<footer></footer>

</body>
</html>