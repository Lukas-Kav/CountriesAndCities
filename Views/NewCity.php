<?php

include '../autoload.php';
$CitiesContoller = new CitiesController();
$CountryId = $_GET['countryId'];

 ?>
<style>
    <?php include '../style.css'; ?>
</style>
<h2>Create New City</h2>
<form class="editNnew-form" method="POST">
            <label>Name: </label>
            <input type="text" name="title"><br>
              <label>Population: </label>
              <input type="text" name="population"><br>
              <label>Area Size: </label>
              <input type="text" name="AreaSize"><br>
              <label>Post Code: </label>
              <input type="text" name="PostCode"><br><br>
        <button name="submit" type="submit">Submit</button>
    </form>

<?php

        if(isset($_POST['submit']))
        {
            $Date = date("Y-m-d");
            $mess = $CitiesContoller->addCity([$_POST['title'], $_POST['population'], $_POST['AreaSize'], $_POST['PostCode'], $Date, $CountryId]);
            echo $mess;
        }

?>

<br><br>
<a href="CitiesView.php?countryId=<?php echo $CountryId ?>"><button>Back</button></a>
