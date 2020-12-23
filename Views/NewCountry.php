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
        <button class="btn" name="submit" type="submit">Submit</button>
    </form>

<?php

        if(isset($_POST['submit']))
        {
            $mess = $CountriesContoller->addCountry($_POST['title'], $_POST['size']);
            echo $mess;
        }

?>

<br><br>
<a href="CountriesView.php">Back</a>
