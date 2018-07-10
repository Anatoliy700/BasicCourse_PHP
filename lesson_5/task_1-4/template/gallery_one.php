<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery one</title>
    <style>
        img{
            max-width: 100%;
            max-height: 85vh;
            margin: auto;
            display: block;
        }
    </style>
</head>
<body>
<h1><?=$image[0]['name']?></h1>
<h3>Просмотров: <?=$image[0]['count']?></h3>
<div>
      <img src="<?= $image[0]['url_max'] ?>" alt="<?=$image[0]['name']?>">
</div>

</body>
</html>
