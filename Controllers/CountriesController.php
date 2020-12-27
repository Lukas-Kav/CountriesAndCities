<?php

class CountriesController extends Countries
{

  function addCountry($DataArray)
  {
    if(empty($DataArray[0]))
    {
      return "Don't leave empty fields";
    }
    else
    {
      $this->setCountry($DataArray);
      return "Added";
    }
  }

  function renewCountry($DataArray, $id)
  {
    if(empty($DataArray[0]))
    {
      return "Don't leave empty fields";
    }
    else
    {
      $this->updateCountry($DataArray, $id);
      return "Updated";
    }
  }

  function returnCountry($id, $SortType, $Page)
  {
    return $this->getCountries($id, $SortType, $Page);
  }

  function returnCountryByName($Name)
  {
    return $this->getCountriesByName($Name);
  }

  function returnCountryByDate($Start, $End)
  {
    return $this->getCountriesByDate($Start, $End);
  }

  function returnPages(){
    $number_of_results = $this->countEntries()['count'];
    $number_of_pages = ceil($number_of_results/10);
    return $number_of_pages;
  }

  function deleteCountry($id)
  {
    $this->removeCities($id);
    return $this->removeCountry($id);
  }

}
