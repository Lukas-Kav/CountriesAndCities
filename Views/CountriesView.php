<?php

include '../autoload.php';

$CountriesContoller = new CountriesController();
$NumberOfPages = $CountriesContoller->returnPages();
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

if(isset($_POST['submit']) and !isset($_POST['showAll']))
{
  $Name = $_POST['countryToFind'];
  $results = $CountriesContoller->returnCountryByName($Name, '');
}
elseif(isset($_POST['sort']))
{
  $SortType = $_POST['sortingType'];
  $results = $CountriesContoller->returnCountry('', $SortType, $page);
}
elseif(isset($_POST['byDate']))
{
  $DateStart = $_POST['start'];
  $DateEnd = $_POST['end'];
  $results = $CountriesContoller->returnCountryByDate($DateStart, $DateEnd);
}
else
{
  $results = $CountriesContoller->returnCountry('', '', $page);
}

if(isset($_GET['delete']))
{
  $id = $_GET['delete'];
  $CountriesContoller->deleteCountry($id);
  header("Refresh:0; url=CountriesView.php?page=$page");
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
                <label>From: </label>
                <input type="date" name="start" value=<?php echo date("Y-m-d", strtotime("-1 week")); ?> />
                <label>To: </label>
                <input type="date" name="end" value=<?php echo date('Y-m-d') ?> />
                <button name="byDate" type="submit">Find by Date</button>
                <button name="showAll" type="submit">Show All</button>
            </div>
    </form>
    <?php if(count($results)>0){ ?>
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
      <a href="?page=<?php echo $page ?>&delete=<?php echo $r['ID'] ?>"><button>Delete</button></a></td>
    </tr>
    <?php endforeach; ?>
    </table>
    <?php } else{ echo "No Entries Found";} ?>
    <br>
    <div style="text-align:center; display:block;">
    <?php if($page > 1){ ?>
    <a href="CountriesView.php?page=<?php echo ($page-1) ?>">Previous &#60&#60; </a>
    <?php } ?>
    <?php for ($i=1;$i<=$NumberOfPages;$i++) { ?>
    <a href="CountriesView.php?page=<?php echo $i ?>"><?php echo $i ?></a>
    <?php } ?>
    <?php if($page < $NumberOfPages){ ?>
    <a href="CountriesView.php?page=<?php echo ($page+1) ?>"> &#62&#62; Next</a>
    <?php } ?>
    </div>
    <br>
    <a href="NewCountry.php"><button>Create New</button></a>
    </body>
