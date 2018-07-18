<?php

/**
 * производит редирект на переданный URL
 * @param $url {url} URL для редиректа
 */
function redirect($url){
  header("Location: {$url}");
}