<?php

class DB
{
  private $host = "localhost";
  private $user = "root";
  private $password = "";
  private $name = "CountriesAndCities";

  public function connect()
  {
    $dsn = 'mysql:host=' . $this->host . '; dbname=' . $this->name;
    $pdo = new PDO($dsn, $this->user, $this->password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }
}
