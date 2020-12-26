<?php

include '../autoload.php';
$CountriesContoller = new CountriesController();

 ?>
<style>
    <?php include '../style.css'; ?>
</style>
<h2>Create New Country</h2>
<form class="editNnew-form" method="POST">
            <label>Name: </label>
            <input type="text" name="title"><br>
              <label>Size: </label>
              <input type="text" name="size"><br>
              <label>Population: </label>
              <input type="text" name="population"><br>
              <label>Phone Code: </label>
              <input type="text" name="phonecode"><br>
        <button name="submit" type="submit">Submit</button>
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
<a href="CountriesView.php"><button>Back</button></a>
