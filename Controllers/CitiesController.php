<?php

class CitiesController extends Cities
{
  private function verify($DataArray)
  {
    if((in_array("", $DataArray)))
    {
      return "Don't leave empty fields";
    }
    elseif (!is_numeric($DataArray[1]))
    {
      return "Population must be a number";
    }
    elseif (!is_numeric($DataArray[2]))
    {
      return "Area size must be a number";
    }
    else
    {
      return True;
    }
  }

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
    $Message = $this->verify($DataArray);
    if($Message === True)
    {
      $this->setCity($DataArray);
      return "Added";
    }
    else
    {
      return $Message;
    }
  }

  function renewCity($DataArray, $id)
  {
    $Message = $this->verify($DataArray);
    if($Message === True)
    {
      $this->updateCity($DataArray, $id);
      return "Updated";
    }
    else
    {
      return $Message;
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
