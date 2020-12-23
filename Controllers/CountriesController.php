<?php

class CountriesController extends Countries
{

  function addCountry($Name, $Size)
  {
    if(empty($Name) or empty($Size))
    {
      return "Don't leave empty fields";
    }
    else
    {
      $this->setCountry($Name, $Size);
      return "Added";
    }
  }

  function renewCountry($Name, $Size, $id)
  {
    if(empty($Name) or empty($Size))
    {
      return "Don't leave empty fields";
    }
    else
    {
      $this->updateCountry($Name, $Size, $id);
      return "Updated";
    }
  }

  function returnCountry($id)
  {
    return $this->getCountries($id);
  }

  function returnCountryByName($Name)
  {
    return $this->getCountriesByName($Name);
  }

  function deleteCountry($id)
  {
    $this->removeCities($id);
    return $this->removeCountry($id);
  }

}
