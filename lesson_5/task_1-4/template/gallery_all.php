<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
    <style>
        div {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        a {
            margin: 5px;
        }

        form {
            margin: 10px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            border: 1px solid #000;
            padding: 5px;
            width: 300px;
        }

        input {
            margin: 5px 0;
        }
    </style>
</head>
<body>
<h1>Галерея</h1>
<div>
  <?php foreach ($arrImages as $image): ?>
      <a href="index.php?id=<?= $image['id'] ?>" target="_blank">
          <img src="<?= $image['url_min'] ?>" alt="<?= $image['name'] ?>" title="<?= $image['name'] ?>">
      </a>
  <?php endforeach; ?>
</div>

<form action="" method="post" enctype="multipart/form-data">
    <label>Выберите картинку для загрузки</label>
    <input type="file" name="<?= $options['inputName'] ?>">
    <input type="submit">
</form
</body>
</html>
