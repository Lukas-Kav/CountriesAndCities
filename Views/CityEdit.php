<?php

include '../autoload.php';
$CitiesContoller = new CitiesController();
$Id = $_GET['edit'];
$results = $CitiesContoller->returnCity($Id)[0];
 ?>

<h2>Update City</h2>
<form method="POST">
        <div class="form-item">
            <label>Name: </label>
            <input type="text" name="title" value=<?php echo $results['Name']; ?>><br><br>
        </div>
        <div class="form-item">
              <label>Population: </label>
              <input type="text" name="population" value=<?php echo $results['Population']; ?>><br><br>
        </div>
        <button class="btn" name="submit" type="submit">Submit</button>
</form>

<?php

        if(isset($_POST['submit']))
        {
            $mess = $CitiesContoller->renewCity($_POST['title'], $_POST['population'], $Id);
            echo $mess;
        }

?>

<br><br>
<a href="CitiesView.php?countryId=<?php echo $results['CountryID'] ?>">Back</a>
