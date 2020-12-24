<?php

class CitiesController extends Cities
{
  function returnCitiesByCountry($CountryId)
  {
    return $this->getCities($CountryId);
  }

  function returnCity($id)
  {
    return $this->getCity($id);
  }

  function addCity($Name, $Population, $Country)
  {
    if(empty($Name) or empty($Population))
    {
      return "Don't leave empty fields";
    }
    else
    {
      $this->setCity($Name, $Population, $Country);
      return "Added";
    }
  }

  function renewCity($Name, $Population, $id)
  {
    if(empty($Name) or empty($Population))
    {
      return "Don't leave empty fields";
    }
    else
    {
      $this->updateCity($Name, $Population, $id);
      return "Updated";
    }
  }

  function deleteCity($id)
  {
    return $this->removeCity($id);
  }


}
