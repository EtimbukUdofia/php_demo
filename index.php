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

// function filter($items, $func){
//   $filteredItems = [];

//   foreach($items as $item){
//     if($func($item)){
//       $filteredItems[] = $item;
//     };
//   };

//   return $filteredItems;
// };

$filteredBooks = array_filter($books, function ($book) {
  return $book["year"] > 2000;
});

require "index.view.php";