<?php

class Cities extends DB
{

  protected function getCities($CountryId)
  {
    $sql = "SELECT * FROM cities WHERE CountryID = $CountryId";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
  }

  protected function getCity($id)
  {
    $sql = "SELECT * FROM cities WHERE ID = $id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
  }

  protected function setCity($name, $population, $country)
  {
    $sql = "INSERT INTO cities(Name, Population, CountryID) VALUES (?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$name, $population, $country]);
  }

  protected function updateCity($name, $population, $id)
  {
    $sql = "UPDATE cities SET Name = '$name', Population = '$population' WHERE ID = $id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
  }

  protected function removeCity($id)
  {
    $sql = "DELETE FROM cities WHERE ID = $id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
  }

}
