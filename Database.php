
<?php
//connect to the database and execute a query
class Database
{
  public $connection;
  public function __construct()
  {
    $dsn = "mysql:host=127.0.0.1;port=3306;dbname=myapp;charset=utf8mb4";

    $this->connection = new PDO($dsn, "root");
  }

  public function query($query)
  {
    $statement = $this->connection->prepare($query);
    $statement->execute();

    return $statement;
  }
}
