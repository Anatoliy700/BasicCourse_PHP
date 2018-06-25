<?php

$a = 1;
$b = 2;

$b = $a + $b;
$a = $b - $a;
$b = $b - $a;

echo "a = {$a} <br> b = {$b}";
