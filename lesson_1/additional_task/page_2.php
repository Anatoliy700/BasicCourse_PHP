<?php
$pageRedirect = 'page_1.php';
$path = dirname($_SERVER['PHP_SELF']).'/';
//echo $path;
header("Location: http://{$_SERVER['HTTP_HOST']}{$path}{$pageRedirect}");