<?php

include '../autoload.php';

$id = $_GET['countryId'];
$CitiesContoller = new CitiesController();
$NumberOfPages = $CitiesContoller->returnPages($id);
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
if(isset($_POST['submit']) and !isset($_POST['showAll']))
{
  $Name = $_POST['cityToFind'];
  $results = $CitiesContoller->returnCityByName($Name, $id);
}
elseif(isset($_POST['sort']))
{
  $SortType = $_POST['sortingType'];
  $results = $CitiesContoller->returnCitiesByCountry($id, $SortType, $page);
}
elseif(isset($_POST['byDate']))
{
  $DateStart = $_POST['start'];
  $DateEnd = $_POST['end'];
  $results = $CitiesContoller->returnCityByDate($DateStart, $DateEnd, $id);
}
else
{
  $results = $CitiesContoller->returnCitiesByCountry($id, '', $page);
}

if(isset($_GET['delete']))
{
  $DeleteId = $_GET['delete'];
  $CitiesContoller->deleteCity($DeleteId);
  header("Refresh:0; url=CitiesView.php?countryId=$id"."&page=$page");
}

?>
    <style>
      <?php include '../style.css'; ?>
    </style>
    <body>
    <h1>Cities</h1>
    <form method="POST">
            <div class="form-item">
                <input type="text" name="cityToFind" placeholder="Search here">
                <button name="submit" type="submit">Submit</button>
                <select name="sortingType">
                  <option value="ascending">Sort ascending by name</option>
                  <option value="descending">Sort descending by name</option>
                </select>
                <button name="sort" type="submit">Sort</button>
                <label>From: </label>
                <input type="date" name="start" value=<?php echo date("Y-m-d", strtotime("-1 week")); ?> />
                <label>To :</label>
                <input type="date" name="end" value=<?php echo date('Y-m-d') ?> />
                <button name="byDate" type="submit">Find by Date</button>
                <button name="showAll" type="submit">Show All</button>
            </div>
    </form>
    <?php if(count($results)>0){ ?>
    <table>
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
      <td><a href="CityEdit.php?edit=<?php echo $r['ID'] ?>"><button>Edit</button></a>
      <a href="?countryId=<?php echo $id ?>&delete=<?php echo $r['ID'] ?>&page=<?php echo $page ?>"><button>Delete</button></a></td>
    </tr>
    <?php endforeach; ?>
    </table>
    <?php }else{ echo "No Entries Found";} ?>
    <br>
    <div style="text-align:center; display:block;">
    <?php for ($page=1;$page<=$NumberOfPages;$page++) { ?>
    <a href="CitiesView.php?countryId=<?php echo $id ?>&page=<?php echo $page ?>"><?php echo $page ?></a>
    <?php } ?>
    </div>
    <a href="NewCity.php?countryId=<?php echo $id ?>"><button>Create New</button></a><br><br>
    <a href="CountriesView.php"><button>Back</button></a>
    </body>
