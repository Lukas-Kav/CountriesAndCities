<?php

class Cities extends DB
{

  protected function getCities($CountryId, $SortType, $page)
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
    if(!empty($page))
    {
      $startingPoint = ($page-1)*10;
      $sql = "SELECT * FROM cities WHERE CountryID = $CountryId".$st." LIMIT ".$startingPoint.", 10";
    }
    else
    {
      $sql = "SELECT * FROM cities WHERE CountryID = $CountryId".$st;
    }
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
  }

  protected function getCitiesByName($Name, $CountryId)
  {
    $sql = "SELECT * FROM cities WHERE Name = '$Name' AND CountryID = $CountryId";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
  }

  protected function getCitiesByDate($dateStart, $dateEnd, $CountryId)
  {
    $sql = "SELECT * FROM cities WHERE AddedOn <= '$dateEnd' AND AddedOn >= '$dateStart' AND CountryID = $CountryId";
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

  protected function setCity($dataArray)
  {
    $sql = "INSERT INTO cities(Name, Population, AreaSize, PostCode, AddedOn, CountryID) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute($dataArray);
  }

  protected function updateCity($dataArray, $id)
  {
    $sql = "UPDATE cities SET Name = '$dataArray[0]', Population = '$dataArray[1]', AreaSize = '$dataArray[2]',
    PostCode = '$dataArray[3]', AddedOn = '$dataArray[4]' WHERE ID = $id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
  }

  protected function countEntries($CountryId)
  {
    $sql = "SELECT COUNT(*) as count FROM cities WHERE CountryID = '$CountryId'";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results[0];
  }

  protected function removeCity($id)
  {
    $sql = "DELETE FROM cities WHERE ID = $id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
  }

}
