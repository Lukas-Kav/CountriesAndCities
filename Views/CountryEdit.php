<?php

include '../autoload.php';
$CountriesContoller = new CountriesController();
$id = $_GET['edit'];
$results = $CountriesContoller->returnCountry($id, '')[0];

 ?>

<h2>Update Country</h2>
<form method="POST">
        <div class="form-item">
            <label>Name: </label>
            <input type="text" name="title" value=<?php echo $results['Name']; ?>><br><br>
        </div>
        <div class="form-item">
              <label>Size: </label>
              <input type="text" name="size" value=<?php echo $results['Size']; ?>><br><br>
        </div>
        <div class="form-item">
              <label>Population: </label>
              <input type="text" name="population" value=<?php echo $results['Population']; ?>><br><br>
        </div>
        <div class="form-item">
              <label>Phone Code: </label>
              <input type="text" name="phoneCode" value=<?php echo $results['PhoneCode']; ?>><br><br>
        </div>
        <button class="btn" name="submit" type="submit">Submit</button>
    </form>

<?php

        if(isset($_POST['submit']))
        {
            $Date = date("Y-m-d");
            $mess = $CountriesContoller->renewCountry([$_POST['title'], $_POST['size'], $_POST['population'], $_POST['phoneCode'], $Date], $id);
            echo $mess;
        }

?>

<br><br>
<a href="CountriesView.php">Back</a>
