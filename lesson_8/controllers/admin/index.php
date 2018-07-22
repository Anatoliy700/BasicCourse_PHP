<?php

if (isAdmin()) {

  render('admin/index-template', [], $layoutOptions);


} else {
  redirect('/lk');
}

