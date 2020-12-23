<?php

include '../autoload.php';
$CitiesContoller = new CitiesController();
$CountryId = $_GET['countryId'];

 ?>

<h2>Create New City</h2>
<form method="POST">
        <div class="form-item">
            <label>Name: </label>
            <input type="text" name="title"><br><br>
        </div>
        <div class="form-item">
              <label>Population: </label>
              <input type="text" name="population"><br><br>
        </div>
        <button class="btn" name="submit" type="submit">Submit</button>
    </form>

<?php

        if(isset($_POST['submit']))
        {
            $mess = $CitiesContoller->addCity($_POST['title'], $_POST['population'], $CountryId);
            echo $mess;
        }

?>

<br><br>
<a href="CitiesView.php?countryId=<?php echo $CountryId ?>">Back</a>
