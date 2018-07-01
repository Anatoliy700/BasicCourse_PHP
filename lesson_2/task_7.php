<?php
function getNowTime() {
  $time = time();
  $hours = date('H', $time);
  $minutes = date('i', $time);
  
  return $hours . ' ' . getCorrectVariant($hours, 'час', 'часа', 'часов') . ' '
    . $minutes . ' ' . getCorrectVariant($minutes, 'минута', 'минуты', 'минут');
}

function getCorrectVariant($num, $var1, $var2, $var3) {
  if ($num > 20) {
    $num %= 10;
  }
  if ($num > 1 && $num < 5) {
    return $var2;
  } elseif ($num === 1) {
    return $var1;
  } else {
    return $var3;
  }
}

echo getNowTime(), '<br>';

/*$t = '14';
echo $t, ' ', getCorrectVariant($t ,'час', 'часа', 'часов');*/