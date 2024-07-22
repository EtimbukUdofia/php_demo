
<?php
//connect to the database and execute a query
class Database
{
  public $connection;
  public $statement;

  public function __construct($config, $username = "root", $password = "")
  {
    $dsn = "mysql:" . http_build_query($config, "", ";"); // http_build_query wiil convert its content ($config) into something like query parameters

    $this->connection = new PDO($dsn, $username, $password, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // this will make the default return from fetching to be an associative array
    ]);
  }

  public function query($query, $params = []) // the query string should always point to anonymous values which will be given meaning to by the $params
  {
    $this->statement = $this->connection->prepare($query);
    $this->statement->execute($params); // this will prevent sql injections from happening from bad urls
    return $this;
  }

  public function find() // custom find method
  {
    return $this->statement->fetch();
  }

  public function findOrFail()
  {
    $result = $this->find();

    if (!$result) {
      abort();
    }

    return $result;
  }

  public function get(){
    return $this->statement->fetchAll();
  }
}
