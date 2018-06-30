<?php
$a = -5;
$b = -7;

if ($a >= 0 && $b >= 0) {
    $res = $a - $b;
    echo $res < 0 ? -$res : $res;
} elseif ($a < 0 && $b < 0) {
    echo $a * $b;
} else {
    echo $a + $b;
}