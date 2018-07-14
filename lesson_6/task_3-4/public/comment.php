<?php
include __DIR__ . '/../backend/config/constants.php';
include ENGINE_DIR . 'render.php';
header('Content-type: text/html; charset=UTF-8');

render('comment-template');

