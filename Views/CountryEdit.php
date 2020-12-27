<?php

include '../autoload.php';
$CountriesContoller = new CountriesController();
$id = $_GET['edit'];
$results = $CountriesContoller->returnCountry($id, '', '')[0];

 ?>
<style>
    <?php include '../style.css'; ?>
</style>
<h2>Update Country</h2>
<form class="editNnew-form" method="POST">
            <label>Name: </label>
            <input type="text" name="title" value=<?php echo $results['Name']; ?>><br>
              <label>Size: </label>
              <input type="text" name="size" value=<?php echo $results['Size']; ?>><br>
              <label>Population: </label>
              <input type="text" name="population" value=<?php echo $results['Population']; ?>><br>
              <label>Phone Code: </label>
              <input type="text" name="phoneCode" value=<?php echo $results['PhoneCode']; ?>><br>
        <button name="submit" type="submit">Submit</button>
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
<a href="CountriesView.php"><button>Back</button></a>
