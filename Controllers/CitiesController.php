<?php

class CitiesController extends Cities
{
  function returnCitiesByCountry($CountryId, $SortType)
  {
    return $this->getCities($CountryId, $SortType);
  }

  function returnCityByName($Name, $CountryId)
  {
    return $this->getCitiesByName($Name, $CountryId);
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

  function deleteCity($id)
  {
    return $this->removeCity($id);
  }


}
