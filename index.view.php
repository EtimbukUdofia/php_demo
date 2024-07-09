<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Demo</title>
</head>

<body>
  <h1>Recommended Books</h1>



  <ul>
    <?php foreach ($filteredBooks as $item) : ?>
      <li>
        <a href="<?= $item["site"] ?>">
          <?= $item["name"] ?> (<?= $item["year"] ?>)
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

</body>

</html>