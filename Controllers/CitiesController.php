<?php

class CitiesController extends Cities
{
  function returnCitiesByCountry($CountryId, $SortType, $Page)
  {
    return $this->getCities($CountryId, $SortType, $Page);
  }

  function returnCityByName($Name, $CountryId)
  {
    return $this->getCitiesByName($Name, $CountryId);
  }

  function returnCityByDate($DateStart, $DateEnd, $CountryId)
  {
    return $this->getCitiesByDate($DateStart, $DateEnd, $CountryId);
  }

  function returnCity($id)
  {
    return $this->getCity($id);
  }

  function addCity($DataArray)
  {
    if(empty($DataArray[0]))
    {
      return "Don't leave empty fields";
    }
    else
    {
      $this->setCity($DataArray);
      return "Added";
    }
  }

  function renewCity($DataArray, $id)
  {
    if(empty($DataArray[0]))
    {
      return "Don't leave empty fields";
    }
    else
    {
      $this->updateCity($DataArray, $id);
      return "Updated";
    }
  }

  function returnPages($CountryId){
    $number_of_results = $this->countEntries($CountryId)['count'];
    $number_of_pages = ceil($number_of_results/10);
    return $number_of_pages;
  }

  function deleteCity($id)
  {
    return $this->removeCity($id);
  }


}
