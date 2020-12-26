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

  function returnCountry($id, $SortType)
  {
    return $this->getCountries($id, $SortType);
  }

  function returnCountryByName($Name)
  {
    return $this->getCountriesByName($Name);
  }

  function returnCountryByDate($Start, $End)
  {
    return $this->getCountriesByDate($Start, $End);
  }

  function deleteCountry($id)
  {
    $this->removeCities($id);
    return $this->removeCountry($id);
  }

}
