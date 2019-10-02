<?php

if(!isset($_SESSION['manufacturer_email'])){

    echo "<script>window.open('../org.php','_self')</script>";
}

else {

$man_email=$_SESSION['manufacturer_email'];
$man_id=$_SESSION['manufacturer_id'];
    
?>


<div class="row"><!-- row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <ol class="breadcrumb"><!-- breadcrumb Starts -->

            <li class="active">

                <i class="fa fa-dashboard"> </i> Dashboard / Unos Pozicije

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

    <div class="panel-heading"><!-- panel-heading Starts -->

        <h3 class="panel-title">

            <i class="fa fa-money fa-fw"></i> Unos pozicije

        </h3>

    </div><!-- panel-heading Ends -->

    <div class="panel-body"><!-- panel-body Starts -->

    <form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" >Naziv pozicije </label>

            <div class="col-md-6" >

            <input type="text" name="product_title" class="form-control" required >

            </div>

        </div><!-- form-group Ends -->


        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" >  Url pozicije </label>

            <div class="col-md-6" >

                <input type="text" name="product_url" class="form-control" required >

                <br>

                <p style="font-size:15px; font-weight:bold;">

                    Url primer : asistent-prodaje

                </p>

            </div>

        </div><!-- form-group Ends -->


        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" > Oblast </label>

            <div class="col-md-6" >

                <select name="cat" class="form-control" >

                    <option> izaberi oblast </option>

                    <?php

                    $get_cat = "select * from categories ";

                    $run_cat = mysqli_query($con,$get_cat);

                    while ($row_cat=mysqli_fetch_array($run_cat)) {

                        $cat_id = $row_cat['cat_id'];

                        $cat_title = $row_cat['cat_title'];

                        echo "<option value='$cat_id'>$cat_title</option>";

                    }

                    ?>

                </select>

            </div>

        </div><!-- form-group Ends -->

        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" >Slika pozicije </label>

            <div class="col-md-6" >

                <input type="file" name="product_img1" class="form-control" required >

            </div>

        </div><!-- form-group Ends -->

        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" > Prilog 1 </label>

            <div class="col-md-6" >

                <input type="file" name="product_img2" class="form-control" >

            </div>

        </div><!-- form-group Ends -->

        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" > Prilog 2 </label>

            <div class="col-md-6" >

                <input type="file" name="product_img3" class="form-control"  >

            </div>

        </div><!-- form-group Ends -->


        <div class="form-group" ><!-- form-group Starts -->


            <label class="col-md-3 control-label" > Potrebno volontera </label>

            <div class="col-md-6" >

                <input type="text" name="product_kolicina" class="form-control" required >

            </div>

        </div><!-- form-group Ends -->


        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" >  Keywords pozicije</label>

            <div class="col-md-6" >

                <input type="text" name="product_keywords" class="form-control"  >

            </div>

        </div><!-- form-group Ends -->

        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" >Od</label>

            <div class="col-md-3" >

                <input type="date" name="product_od" class="form-control" >

            </div>

        </div><!-- form-group Ends -->
        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" >Do</label>

            <div class="col-md-3" >

                <input type="date" name="product_do" class="form-control" >

            </div>

        </div><!-- form-group Ends -->

        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" >Lokacija</label>

            <div class="col-md-6" >

                <input type="text" name="product_lokacija" class="form-control" >

            </div>

        </div><!-- form-group Ends -->

        <div class="form-group" ><!-- form-group Starts -->

            <label class="control-label" > Tabovi </label>

            <div >

                <ul class="nav nav-tabs"><!-- nav nav-tabs Starts -->

                    <li class="active">

                        <a data-toggle="tab" href="#description"> Kratak Opis </a>

                    </li>

                    <li>

                        <a data-toggle="tab" href="#features"> Detaljan opis </a>

                    </li>

                    <li>

                        <a data-toggle="tab" href="#video"> Multimedia </a>

                    </li>

                </ul><!-- nav nav-tabs Ends -->

                <div class="tab-content"><!-- tab-content Starts -->

                    <div id="description" class="tab-pane fade in active"><!-- description tab-pane fade in active Starts -->

                    <br>

                    <textarea name="product_desc" class="form-control" rows="15" id="product_desc"></textarea>

                    </div><!-- description tab-pane fade in active Ends -->


                    <div id="features" class="tab-pane fade in"><!-- features tab-pane fade in Starts -->

                    <br>

                    <textarea name="product_features" class="form-control" rows="15" id="product_features"></textarea>

                    </div><!-- features tab-pane fade in Ends -->


                    <div id="video" class="tab-pane fade in"><!-- video tab-pane fade in Starts -->

                    <br>

                    <textarea name="product_video" id="product_video" class="form-control" rows="15"></textarea>

                    </div><!-- video tab-pane fade in Ends -->


                </div><!-- tab-content Ends -->

            </div>

        </div><!-- form-group Ends -->

        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" > Etiketa </label>

            <div class="col-md-6" >

                <input type="text" name="product_label" class="form-control"  >

            </div>

        </div><!-- form-group Ends -->

        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" ></label>

            <div class="col-md-6" >

                <input type="submit" name="submit" value="Unos pozicije" class="btn btn-primary form-control" >

            </div>

        </div><!-- form-group Ends -->

    </form><!-- form-horizontal Ends -->

    </div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 


<?php

if(isset($_POST['submit'])){

    $product_title = escape($_POST['product_title']);
    $cat = $_POST['cat'];
    $manufacturer_id = $man_id;

    $product_desc = escape($_POST['product_desc']);
    $product_keywords = escape($_POST['product_keywords']);

    $product_kolicina = escape($_POST['product_kolicina']);   
    $product_od = $_POST['product_od'];   
    $product_do = $_POST['product_do']; 
    $product_lokacija = escape($_POST['product_lokacija']); 

    $product_label = escape($_POST['product_label']);

    $product_url = escape($_POST['product_url']);

    $product_features = escape($_POST['product_features']);

    $product_video = escape($_POST['product_video']);

    $status = "product";

    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];

    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];

    

    $insert_product = "insert into products (cat_id,manufacturer_id,date,product_title,product_url,product_img1,product_img2,product_img3,product_kolicina,product_desc,product_features,product_video,product_keywords,product_label,status,product_lokacija,product_od,product_do) values ('$cat','$manufacturer_id',NOW(),'$product_title','$product_url','$product_img1','$product_img2','$product_img3','$product_kolicina','$product_desc','$product_features','$product_video','$product_keywords','$product_label','$status','$product_lokacija','$product_od','$product_do')";

    $run_product = mysqli_query($con,$insert_product);
    

        if($run_product){
            
        move_uploaded_file($temp_name1,"../admin_area/product_images/$product_img1");
        move_uploaded_file($temp_name2,"../admin_area/product_images/$product_img2");
        move_uploaded_file($temp_name3,"../admin_area/product_images/$product_img3");

        echo "<script>alert('Pozicija je uneta')</script>";

        echo "<script>window.open('index.php?view_products','_self')</script>";

        }

}

?>

<?php } ?>


