<?php
$a = 5;
$b = 7;

if ($a >= 0 XOR $b >= 0) {
  echo $a + $b;
} elseif ($a < 0) {
    echo $a * $b;
} else {
  $res = $a - $b;
  echo $res < 0 ? -$res : $res;
}