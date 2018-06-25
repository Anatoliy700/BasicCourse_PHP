<?php
echo "Hello, World!";

echo "\n<br><br>";

$name = "GeekBrains user";
echo "Hello, $name!";

echo "\n<br><br>";

define('MY_CONST', 100);
echo MY_CONST;

echo "\n<br><br>";

$int10 = 42;
$int2 = 0b101010;
$int8 = 052;
$int16 = 0x2A;
echo "Десятеричная система $int10 <br>";
echo "Двоичная система $int2 <br>";
echo "Восьмеричная система $int8 <br>";
echo "Шестнадцатеричная система $int16 <br>";

echo "\n<br><br>";

$precise1 = 1.5;
$precise2 = 1.5e4;
$precise3 = 6E-8;
echo "$precise1 | $precise2 | $precise3";

echo "\n<br><br>";

$a = 1;
echo "a";
echo 'a';

echo "\n<br><br>";

$a = 10;
$b = (boolean) $a;
var_dump($b);

echo "\n<br><br>";

$a = 'Hello,';
$b = 'world';
$c = $a . $b;
echo $c;

echo "\n<br><br>";

$a = 4;
$b = 5;
echo $a + $b . '<br>'; // сложение
echo $a * $b . '<br>'; // умножение
echo $a - $b . '<br>'; // вычитание
echo $a / $b . '<br>'; // деление
echo $a % $b . '<br>'; // остаток от деления
echo $a ** $b . '<br>'; // возведение в степень

echo "\n<br><br>";

$a = 4;
$b = 5;
$a += $b;
echo 'a = ' . $a;
echo '<br>';
$a = 0;
echo $a++; // Постинкремент
echo '<br>';
echo ++$a; // Преинкремент
echo '<br>';
echo $a--; // Постдекремент
echo '<br>';
echo --$a; // Предекремент

echo "\n<br><br>";

$a = 4;
$b = 5;
var_dump($a == $b); // Сравнение по значению
var_dump($a === $b); // Сравнение по значению и типу
var_dump($a > $b); // Больше
var_dump($a < $b); // Меньше
var_dump($a <> $b); // Не равно
var_dump($a != $b); // Не равно
var_dump($a !== $b); // Не равно без приведения типов
var_dump($a <= $b); // Меньше или равно
var_dump($a >= $b); // Больше или равно