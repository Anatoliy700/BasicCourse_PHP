<?php

if (isAdmin()) {
  //получаем все продукты из БД
  $products = getProducts();

//если пользователь авторизован то выводим в глобальном шаблоне ссылку на выход иначе выводим ссылку на вход
  
  $layoutOptions['login'] = checkAuthUsers() ? $linkAuthUserOut : $linkAuthUserIn;


//выводим шаблон заполненный товарами из БД
  render('admin/catalog-template', ['products' => $products], $layoutOptions);
  
} else {
  redirect('/lk');
}


