<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Demo</title>
</head>

<body>
  <h1>Recommended Books</h1>

  <?php
  $books = [
    [
      "name" => "golden retriever tut",
      "author" => "John Doe",
      "site" => "http://example.com",
      "year" => 2011
    ],
    [
      "name" => "Charisma of the street",
      "author" => "Sam young",
      "site" => "http://example.com",
      "year" => 1967
    ],
    [
      "name" => "Thug hunter",
      "author" => "Mori Kogi",
      "site" => "http://example.com",
      "year" => 2022
    ]
  ];

  function filter($items, $key, $value){
    $filteredItems = [];

    foreach($items as $item){
      if($item["$key"] === $value){
        $filteredItems[] = $item;
      }
    };

    return $filteredItems;
  };

  $filteredBooks = filter($books, "year", "2022");
  ?>

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