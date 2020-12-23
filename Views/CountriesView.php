<?php

include '../autoload.php';

$CountriesContoller = new CountriesController();
if(isset($_POST['submit']))
{
  $Name = $_POST['countryToFind'];
  $results = $CountriesContoller->returnCountryByName($Name);
}
else
{
  $results = $CountriesContoller->returnCountry('');
}

?>
    <body>
    <h2>Countries</h2>
    <form method="POST">
            <div class="form-item">
                <label>Search: </label>
                <input type="text" name="countryToFind">
                <button class="btn" name="submit" type="submit">Submit</button>
            </div>
    </form>
    <table style="width:25%">
      <tr>
        <th style="text-align:left">Name</th>
        <th style="text-align:left">Size</th>
        <th style="text-align:left">Actions</th>
      </tr>
    <?php foreach ($results as $r):?>
    <tr>
      <td><a href="CitiesView.php?countryId=<?php echo $r['ID'] ?>"><?php echo $r['Name']; ?></a></td>
      <td><?php echo $r['Size']; ?></td>
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
