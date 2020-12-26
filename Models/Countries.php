<?php

class Countries extends DB
{

  protected function getCountries($id, $SortType)
  {
    $st = "";
    if(!empty($SortType))
    {
      if($SortType == 'ascending')
      {
        $st = " ORDER BY Name ASC";
      }

      if($SortType == 'descending')
      {
        $st = " ORDER BY Name DESC";
      }
    }
    $wh = "";
    if(!empty($id))
    {
      $wh = " WHERE ID = $id";
    }
    $sql = "SELECT * FROM countries".$wh.$st;
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
  }

  protected function getCountriesByName($name)
  {
    $sql = "SELECT * FROM countries WHERE Name = '$name'";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
  }

  protected function setCountry($dataArray)
  {
    $sql = "INSERT INTO countries(Name, Size, Population, PhoneCode, AddedOn) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute($dataArray);
  }

  protected function updateCountry($dataArray, $id)
  {
    $sql = "UPDATE countries SET Name = '$dataArray[0]', Size = '$dataArray[1]',
    Population= '$dataArray[2]', PhoneCode= '$dataArray[3]', AddedOn= '$dataArray[4]' WHERE ID = $id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
  }

  protected function removeCountry($id)
  {
    $sql = "DELETE FROM countries WHERE ID = $id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
  }

  protected function removeCities($id)
  {
    $sql = "DELETE FROM cities WHERE CountryID = $id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
  }
}
