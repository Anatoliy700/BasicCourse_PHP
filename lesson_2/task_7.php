<?php
function getNowTime() {
  $hours = date('H');
  $minutes = date('i');
  
  
  return $hours . ' ' . getCorrectVariant($hours, 'час', 'часа', 'часов') . ' '
    . $minutes . ' ' . getCorrectVariant($minutes, 'минута', 'минуты', 'минут');
}

function getCorrectVariant($num, $var1, $var2, $var3) {
  $num = (int)$num;
  $lastNum = $num % 10;
  if (($num > 10 && $num < 21) || $lastNum === 0 || ($lastNum >= 5 && $lastNum <= 9)) return $var3;
  elseif ($lastNum === 1) return $var1;
  else return $var2;
}

echo getNowTime(), '<br>';

/*$t = '14';
echo $t, ' ', getCorrectVariant($t ,'час', 'часа', 'часов');*/