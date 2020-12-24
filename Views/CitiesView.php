<?php

include '../autoload.php';

$id = $_GET['countryId'];
$CitiesContoller = new CitiesController();
$results = $CitiesContoller->returnCitiesByCountry($id);

?>
    <body>
    <h2>Cities</h2>
    <table style="width:25%">
      <tr>
        <th style="text-align:left">Name</th>
        <th style="text-align:left">Population</th>
        <th style="text-align:left">Actions</th>
      </tr>
    <?php foreach ($results as $r):?>
    <tr>
      <td><?php echo $r['Name']; ?></td>
      <td><?php echo $r['Population']; ?></td>
      <td><a href="CityEdit.php?edit=<?php echo $r['ID'] ?>">Edit</a>
      <a href="?countryId=<?php echo $id ?>&delete=<?php echo $r['ID'] ?>">Delete</a></td>
    </tr>
    <?php endforeach; ?>
    </table>
    <a href="NewCity.php?countryId=<?php echo $id ?>">Create New</a><br><br>
    <a href="CountriesView.php">Back</a>
    </body>
<?php
if(isset($_GET['delete']))
{
  $DeleteId = $_GET['delete'];
  $CitiesContoller->deleteCity($DeleteId);
  header("Refresh:0; url=CitiesView.php?countryId=$id");
}
?>
