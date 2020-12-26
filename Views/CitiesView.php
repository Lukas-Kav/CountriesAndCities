<?php

include '../autoload.php';

$id = $_GET['countryId'];
$CitiesContoller = new CitiesController();
if(isset($_POST['submit']) and !isset($_POST['showAll']))
{
  $Name = $_POST['cityToFind'];
  $results = $CitiesContoller->returnCityByName($Name, $id);
}
elseif(isset($_POST['sort']))
{
  $SortType = $_POST['sortingType'];
  $results = $CitiesContoller->returnCitiesByCountry($id, $SortType);
}
else
{
  $results = $CitiesContoller->returnCitiesByCountry($id, '');
}

?>
    <body>
    <h2>Cities</h2>
    <form method="POST">
            <div class="form-item">
                <label>Search: </label>
                <input type="text" name="cityToFind">
                <button class="btn" name="submit" type="submit">Submit</button>
                <button class="btn" name="showAll" type="submit">Show All</button>
                <select name="sortingType">
                  <option value="ascending">Sort ascending by name</option>
                  <option value="descending">Sort descending by name</option>
                </select>
                <button class="btn" name="sort" type="submit">Sort</button>
            </div>
    </form>
    <table style="width:25%">
      <tr>
        <th style="text-align:left">Name</th>
        <th style="text-align:left">Population</th>
        <th style="text-align:left">Area Size</th>
        <th style="text-align:left">Post Code</th>
        <th style="text-align:left">Actions</th>
      </tr>
    <?php foreach ($results as $r):?>
    <tr>
      <td><?php echo $r['Name']; ?></td>
      <td><?php echo $r['Population']; ?></td>
      <td><?php echo $r['AreaSize']; ?></td>
      <td><?php echo $r['PostCode']; ?></td>
      <td><a href="CityEdit.php?edit=<?php echo $r['ID'] ?>">Edit</a>
      <a href="?countryId=<?php echo $id ?>&delete=<?php echo $r['ID'] ?>">Delete</a></td>
    </tr>
    <?php endforeach; ?>
    </table>
    <br><br>
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
