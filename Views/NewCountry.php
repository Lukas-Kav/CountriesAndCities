<?php

include '../autoload.php';
$CountriesContoller = new CountriesController();

 ?>

<h2>Create New Country</h2>
<form method="POST">
        <div class="form-item">
            <label>Name: </label>
            <input type="text" name="title"><br><br>
        </div>
        <div class="form-item">
              <label>Size: </label>
              <input type="text" name="size"><br><br>
        </div>
        <div class="form-item">
              <label>Population: </label>
              <input type="text" name="population"><br><br>
        </div>
        <div class="form-item">
              <label>Phone Code: </label>
              <input type="text" name="phonecode"><br><br>
        </div>
        <button class="btn" name="submit" type="submit">Submit</button>
    </form>

<?php

        if(isset($_POST['submit']))
        {
            $Date = date("Y-m-d");
            $mess = $CountriesContoller->addCountry([$_POST['title'], $_POST['size'], $_POST['population'], $_POST['phonecode'], $Date]);
            echo $mess;
        }

?>

<br><br>
<a href="CountriesView.php">Back</a>
