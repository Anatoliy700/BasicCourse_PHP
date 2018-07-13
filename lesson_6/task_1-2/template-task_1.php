<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Calculate</title>
  <style>
    .input {
      display: inline-block;
      margin: 10px 10px 10px 0;
    }

    input {
      display: block;
    }

    select {
      margin-right: 10px;
    }
  </style>
</head>
<body>
<div>
  <p><?= $out ?></p>
</div>
<div>
  <form action="" method="post">
    <div class="input">Введите первый аргумент<input name="numA" type="text"></div>
    <div class="input">Введите второй аргумент<input name="numB" type="text"></div>
    <div>
      <select name="operation" id="">
        <option value="">Выберите тип операции</option>
        <option value="+">сложение</option>
        <option value="-">разность</option>
        <option value="*">умножение</option>
        <option value="/">деление</option>
      </select>
      <button type="submit">Расчитать</button>
    </div>

  </form>
</div>

</body>
</html>