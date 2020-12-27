<?php

class CountriesController extends Countries
{

  private function verify($DataArray)
  {
    if((in_array("", $DataArray)))
    {
      return "Don't leave empty fields";
    }
    elseif (!is_numeric($DataArray[1]))
    {
      return "Size must be a number";
    }
    elseif (!is_numeric($DataArray[2]))
    {
      return "Population must be a number";
    }
    else
    {
      return True;
    }
  }

  function addCountry($DataArray)
  {
      $Message = $this->verify($DataArray);
      if($Message === True)
      {
      $this->setCountry($DataArray);
      return "Added";
      }
      else
      {
        return $Message;
      }
    }

  function renewCountry($DataArray, $id)
  {
    $Message = $this->verify($DataArray);
    if($Message === True)
    {
      $this->updateCountry($DataArray, $id);
      return "Updated";
    }
    else
    {
      return $Message;
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
