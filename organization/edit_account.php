<?php

$manufacturer_email = $_SESSION['manufacturer_email'];

$get_manufacturer = "select * from organizations where manufacturer_email='$manufacturer_email'";

$run_manufacturer = mysqli_query($con, $get_manufacturer);

$row_manufacturer = mysqli_fetch_array($run_manufacturer);

    $m_id = $row_manufacturer['manufacturer_id'];

    $m_title = $row_manufacturer['manufacturer_title'];

    $m_title_full = $row_manufacturer['manufacturer_title_full'];

    $m_top = $row_manufacturer['manufacturer_top'];

    $m_image = $row_manufacturer['manufacturer_image'];

    $new_m_image = $row_manufacturer['manufacturer_image'];

    $m_opis = $row_manufacturer['manufacturer_opis'];

    $m_mesto = $row_manufacturer['manufacturer_mesto'];

    $m_adresa = $row_manufacturer['manufacturer_adresa'];

    $m_tel = $row_manufacturer['manufacturer_tel'];

    $m_email = $row_manufacturer['manufacturer_email'];

    $m_url = $row_manufacturer['manufacturer_url'];


?>

<h1 align="center" >Ažuriranje podataka </h1>


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->



<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

    <div class="form-group"><!-- form-group Starts -->

        <label class="col-md-3 control-label"> Skraćeno ime </label>

        <div class="col-md-6">

            <input type="text" name="manufacturer_name" class="form-control" value="<?php echo $m_title; ?>" >

        </div>

    </div><!-- form-group Ends -->

    <div class="form-group"><!-- form-group Starts -->

        <label class="col-md-3 control-label"> Puno ime </label>

        <div class="col-md-6">

            <input type="text" name="manufacturer_name_full" class="form-control" value="<?php echo $m_title_full; ?>" >

        </div>

    </div><!-- form-group Ends -->


    <div class="form-group"><!-- form-group Starts -->

        <label class="col-md-3 control-label"> Mesto </label>

        <div class="col-md-6">

            <input type="text" name="manufacturer_mesto" class="form-control" value="<?php echo $m_mesto; ?>">

        </div>

    </div><!-- form-group Ends -->


    <div class="form-group"><!-- form-group Starts -->

        <label class="col-md-3 control-label"> Adresa </label>

        <div class="col-md-6">

            <input type="text" name="manufacturer_adresa" class="form-control" value="<?php echo $m_adresa; ?>" >

        </div>

    </div><!-- form-group Ends -->

    <div class="form-group"><!-- form-group Starts -->

        <label class="col-md-3 control-label"> Telefon </label>

        <div class="col-md-6">

            <input type="text" name="manufacturer_telefon" class="form-control" value="<?php echo $m_tel; ?>">

        </div>

    </div><!-- form-group Ends -->

    <div class="form-group"><!-- form-group Starts -->

        <label class="col-md-3 control-label"> Email </label>

        <div class="col-md-6">

            <input type="email" name="manufacturer_email" class="form-control" value="<?php echo $m_email; ?>">

        </div>

    </div><!-- form-group Ends -->

    <div class="form-group"><!-- form-group Starts -->

        <label class="col-md-3 control-label"> Site </label>

        <div class="col-md-6">

            <input type="url" name="manufacturer_url" class="form-control" value="<?php echo $m_url; ?>">

        </div>

    </div><!-- form-group Ends -->

    <div class="form-group"><!-- form-group Starts -->

        <label class="-label"> Opis </label>

        <div >

            <textarea id="text1" class="form-control" rows="10" name="manufacturer_opis"><?php echo $m_opis; ?></textarea>

        </div>

    </div><!-- form-group Ends -->




    <div class="form-group"><!-- form-group Starts -->

        <label class="col-md-3 control-label"> Logo Organizatora </label>

        <div class="col-md-6">

            <input type="file" name="manufacturer_image" class="form-control" >

            <br>

            <img src="../admin_area/other_images/<?php echo $m_image; ?>" width="200" height="200">

        </div>

    </div><!-- form-group Ends -->

    <div class="form-group"><!-- form-group Starts -->

        <label class="col-md-3 control-label"> </label>

        <div class="col-md-6">

            <input type="submit" name="update" class="form-control btn btn-primary" value=" Ažuriranje podataka " >

        </div>

    </div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php

if (isset($_POST['update'])) {
    $manufacturer_name = escape($_POST['manufacturer_name']);

    $manufacturer_name_full = escape($_POST['manufacturer_name_full']);

    $manufacturer_mesto = escape($_POST['manufacturer_mesto']);

    $manufacturer_adresa = escape($_POST['manufacturer_adresa']);

    $manufacturer_telefon = escape($_POST['manufacturer_telefon']);

    $manufacturer_email = filter_var($_POST['manufacturer_email'], FILTER_SANITIZE_EMAIL);
    
    $manufacturer_url = filter_var($_POST['manufacturer_url'], FILTER_SANITIZE_URL);

    $manufacturer_opis = escape($_POST['manufacturer_opis']);

    $manufacturer_image = $_FILES['manufacturer_image']['name'];

    $tmp_name = $_FILES['manufacturer_image']['tmp_name'];


    if (empty($manufacturer_image)) {
        $manufacturer_image = $new_m_image;
    } else {
         $file="../admin_area/other_images" ."/". $new_m_image;

        if (file_exists($file)) {
              unlink($file);
        }
    }
    
    move_uploaded_file($tmp_name, "../admin_area/other_images/$manufacturer_image");

    $update_manufacturer = "update organizations set manufacturer_title='$manufacturer_name',manufacturer_title_full='$manufacturer_name_full',manufacturer_image='$manufacturer_image',manufacturer_opis='$manufacturer_opis',manufacturer_mesto='$manufacturer_mesto',manufacturer_adresa='$manufacturer_adresa',manufacturer_tel='$manufacturer_telefon',manufacturer_email='$manufacturer_email', manufacturer_url='$manufacturer_url' where manufacturer_id='$m_id'";

    $run_manufacturer = mysqli_query($con, $update_manufacturer);

    if ($run_manufacturer) {
        echo "<script>alert('Organizacija je ažuriran')</script>";

        echo "<script>window.open('index.php?dashboard','_self')</script>";
    }
}

?>

