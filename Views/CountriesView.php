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
elseif(isset($_POST['byDate']))
{
  $DateStart = $_POST['start'];
  $DateEnd = $_POST['end'];
  $results = $CountriesContoller->returnCountryByDate($DateStart, $DateEnd);
}
else
{
  $results = $CountriesContoller->returnCountry('', '');
}

?>
    <style>
      <?php include '../style.css'; ?>
    </style>
    <body>
    <h1>Countries</h1>
    <form method="POST">
            <div>
                <input type="text" name="countryToFind" placeholder="Search here">
                <button name="submit" type="submit">Submit</button>
                <select name="sortingType">
                  <option value="ascending">Sort ascending by name</option>
                  <option value="descending">Sort descending by name</option>
                </select>
                <button name="sort" type="submit">Sort</button>
                <input type="date" name="start" value=<?php echo date("Y-m-d", strtotime("-1 week")); ?> />
                <input type="date" name="end" value=<?php echo date('Y-m-d') ?> />
                <button name="byDate" type="submit">Find by Date</button>
                <button name="showAll" type="submit">Show All</button>
            </div>
    </form>
    <table>
      <tr>
        <th>Name</th>
        <th>Size</th>
        <th>Population</th>
        <th>PhoneCode</th>
        <th>Actions</th>
      </tr>
    <?php foreach ($results as $r):?>
    <tr>
      <td><a href="CitiesView.php?countryId=<?php echo $r['ID'] ?>"><?php echo $r['Name']; ?></a></td>
      <td><?php echo $r['Size']; ?></td>
      <td><?php echo $r['Population']; ?></td>
      <td><?php echo $r['PhoneCode']; ?></td>
      <td><a href="CountryEdit.php?edit=<?php echo $r['ID'] ?>"><button>Edit</button></a>
      <a href="?delete=<?php echo $r['ID'] ?>"><button>Delete</button></a></td>
    </tr>
    <?php endforeach; ?>
    </table>
    <a href="NewCountry.php"><button>Create New</button></a>
    </body>

<?php

if(isset($_GET['delete']))
{
  $id = $_GET['delete'];
  $CountriesContoller->deleteCountry($id);
  header("Refresh:0; url=CountriesView.php");
}

?>
