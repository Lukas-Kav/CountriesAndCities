<?php

include '../autoload.php';

$CountriesContoller = new CountriesController();
if(isset($_POST['submit']) and !isset($_POST['showAll']))
{
  $Name = $_POST['countryToFind'];
  $results = $CountriesContoller->returnCountryByName($Name, '');
}
elseif(isset($_POST['sort']))
{
  $SortType = $_POST['sortingType'];
  $results = $CountriesContoller->returnCountry('', $SortType);
}
else
{
  $results = $CountriesContoller->returnCountry('', '');
}

?>
    <body>
    <h2>Countries</h2>
    <form method="POST">
            <div class="form-item">
                <label>Search: </label>
                <input type="text" name="countryToFind">
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
        <th style="text-align:left">Size</th>
        <th style="text-align:left">Population</th>
        <th style="text-align:left">PhoneCode</th>
        <th style="text-align:left">Actions</th>
      </tr>
    <?php foreach ($results as $r):?>
    <tr>
      <td><a href="CitiesView.php?countryId=<?php echo $r['ID'] ?>"><?php echo $r['Name']; ?></a></td>
      <td><?php echo $r['Size']; ?></td>
      <td><?php echo $r['Population']; ?></td>
      <td><?php echo $r['PhoneCode']; ?></td>
      <td><a href="CountryEdit.php?edit=<?php echo $r['ID'] ?>">Edit</a>
      <a href="?delete=<?php echo $r['ID'] ?>">Delete</a></td>
    </tr>
    <?php endforeach; ?>
    </table>
    <br><br>
    <a href="NewCountry.php">Create New</a>
    </body>

<?php

if(isset($_GET['delete']))
{
  $id = $_GET['delete'];
  $CountriesContoller->deleteCountry($id);
  header("Refresh:0; url=CountriesView.php");
}

?>
