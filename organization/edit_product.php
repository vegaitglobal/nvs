<?php

if (!isset($_SESSION['manufacturer_email'])) {
    echo "<script>window.open('../org.php','_self')</script>";
} else {
    $man_email=$_SESSION['manufacturer_email'];
    $man_id=$_SESSION['manufacturer_id'];
    


    if (isset($_GET['edit_product'])) {
        $edit_id = $_GET['edit_product'];

        $get_p = "select * from products where product_id='$edit_id'";

        $run_edit = mysqli_query($con, $get_p);

        $row_edit = mysqli_fetch_array($run_edit);

        $p_id = $row_edit['product_id'];

        $p_title = $row_edit['product_title'];

        $cat = $row_edit['cat_id'];

        $m_id = $row_edit['manufacturer_id'];

        $p_image1 = $row_edit['product_img1'];

        $p_image2 = $row_edit['product_img2'];

        $p_image3 = $row_edit['product_img3'];

        $new_p_image1 = $row_edit['product_img1'];

        $new_p_image2 = $row_edit['product_img2'];

        $new_p_image3 = $row_edit['product_img3'];

        $p_kolicina = $row_edit['product_kolicina'];

        $p_keywords = $row_edit['product_keywords'];

        $p_od = $row_edit['product_od'];
        $p_do = $row_edit['product_do'];
        $p_lokacija = $row_edit['product_lokacija'];

        $p_desc = $row_edit['product_desc'];

        $p_label = $row_edit['product_label'];

        $p_url = $row_edit['product_url'];

        $p_features = $row_edit['product_features'];

        $p_video = $row_edit['product_video'];
    }



    $get_cat = "select * from categories where cat_id='$cat'";

    $run_cat = mysqli_query($con, $get_cat);

    $row_cat = mysqli_fetch_array($run_cat);

    $cat_title = $row_cat['cat_title'];

    ?>


<div class="row"><!-- row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <ol class="breadcrumb"><!-- breadcrumb Starts -->

            <li class="active">

                <i class="fa fa-dashboard"> </i> Dashboard / Promena pozicije

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

    <div class="panel-heading"><!-- panel-heading Starts -->

        <h3 class="panel-title">

            <i class="fa fa-money fa-fw"></i> Ažuriranje pozicije

        </h3>

    </div><!-- panel-heading Ends -->

    <div class="panel-body"><!-- panel-body Starts -->

    <form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-2 control-label" > Naziv </label>

            <div class="col-md-8" >

                <input type="text" name="product_title" class="form-control" required value="<?php echo $p_title; ?>">

            </div>

        </div><!-- form-group Ends -->


        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" > Url pozicije</label>

            <div class="col-md-6" >

                <input type="text" name="product_url" class="form-control" required value="<?php echo $p_url; ?>" >

                <br>

                <p style="font-size:15px; font-weight:bold;">

                    Product Url Example : asistent-prevodilac

                </p>

            </div>

        </div><!-- form-group Ends -->

  

        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" > Oblast </label>

            <div class="col-md-6" >

                <select name="cat" class="form-control" >

                    <option value="<?php echo $cat; ?>" > <?php echo $cat_title; ?> </option>

                    <?php

                    $get_cat = "select * from categories ";

                    $run_cat = mysqli_query($con, $get_cat);

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

            <label class="col-md-3 control-label" > Slika </label>

            <div class="col-md-6" >

                <input type="file" name="product_img1" class="form-control" >
                <br><img src="../admin_area/product_images/<?php echo $p_image1; ?>" width="100" height="100" >

            </div>

        </div><!-- form-group Ends -->

        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" > Prilog 1 </label>

            <div class="col-md-6" >

                <input type="file" name="product_img2" class="form-control" >
                <br><a class="btn btn-primary" href="<?php if (!empty($p_image2)) {
                    echo "../admin_area/product_images/".$p_image2;
                                                     } ?>">
               <?php echo $p_image2; ?> 
                </a>

            </div>

        </div><!-- form-group Ends -->

        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" > Prilog 2 </label>

            <div class="col-md-6" >

                <input type="file" name="product_img3" class="form-control" >
                <br><a class="btn btn-primary " href="<?php if (!empty($p_image3)) {
                    echo "../admin_area/product_images/".$p_image3;
                                                      } ?>">
                   <?php echo $p_image3; ?> 
                </a>

            </div>

        </div><!-- form-group Ends -->

        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" > Potrebno volontera </label>

            <div class="col-md-6" >

                <input type="text" name="product_kolicina" class="form-control" required value="<?php echo $p_kolicina; ?>" >

            </div>

        </div><!-- form-group Ends -->


        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" > Keywords </label>

            <div class="col-md-6" >

                <input type="text" name="product_keywords" class="form-control"  value="<?php echo $p_keywords; ?>" >

            </div>

        </div><!-- form-group Ends -->

        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" >Od</label>

            <div class="col-md-3" >

                <input type="date" name="product_od" class="form-control" value="<?php echo $p_od; ?>" >

            </div>

        </div><!-- form-group Ends -->
        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" >Do</label>

            <div class="col-md-3" >

                <input type="date" name="product_do" class="form-control" value="<?php echo $p_do; ?>">

            </div>

        </div><!-- form-group Ends -->

        <div class="form-group" ><!-- form-group Starts -->

            <label class="control-label" > Tabovi</label>

            <div  >

                <ul class="nav nav-tabs"><!-- nav nav-tabs Starts -->

                    <li class="active">

                        <a data-toggle="tab" href="#description"> Kratak opis </a>

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

                        <textarea name="product_desc" class="form-control" rows="15" id="product_desc">

                            <?php echo $p_desc; ?>

                        </textarea>

                    </div><!-- description tab-pane fade in active Ends -->


                    <div id="features" class="tab-pane fade in"><!-- features tab-pane fade in Starts -->

                        <br>

                        <textarea name="product_features" class="form-control" rows="15" id="product_features">

                            <?php echo $p_features; ?>

                        </textarea>

                    </div><!-- features tab-pane fade in Ends -->


                    <div id="video" class="tab-pane fade in"><!-- video tab-pane fade in Starts -->

                        <br>

                        <textarea name="product_video" id="product_video" class="form-control" rows="15">

                            <?php echo $p_video; ?>

                        </textarea>

                    </div><!-- video tab-pane fade in Ends -->


                </div><!-- tab-content Ends -->

            </div>

        </div><!-- form-group Ends -->

        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" > Etiketa </label>

            <div class="col-md-6" >

                <input type="text" name="product_label" class="form-control"  value="<?php echo $p_label; ?>">

            </div>

        </div><!-- form-group Ends -->

        <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" ></label>

            <div class="col-md-6" >

                <input type="submit" name="update" value="Ažuriraj" class="btn btn-primary form-control" >

            </div>

        </div><!-- form-group Ends -->

        </form><!-- form-horizontal Ends -->

    </div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 



    <?php

    if (isset($_POST['update'])) {
        $product_title = escape($_POST['product_title']);
        $product_cat = $_POST['product_cat'];
        $cat = $_POST['cat'];

        $product_kolicina = escape($_POST['product_kolicina']);
        $product_keywords = escape($_POST['product_keywords']);
        $product_od = $_POST['product_od'];
        $product_do = $_POST['product_do'];
        $product_lokacija =escape($_POST['product_lokacija']);

        $product_desc = escape($_POST['product_desc']);

        $product_label = escape($_POST['product_label']);

        $product_url = filter_var($_POST['product_url'], FILTER_SANITIZE_URL);

        $product_features = escape($_POST['product_features']);

        $product_video = escape($_POST['product_video']);

        $status = "product";

        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];

        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];

        if (empty($product_img1)) {
            $product_img1 = $new_p_image1;
        } else {
            $file="../admin_area/product_images" ."/". $new_p_image1;

            if (file_exists($file)) {
                    unlink($file);
            }
        }


        if (empty($product_img2)) {
            $product_img2 = $new_p_image2;
        } else {
             $file="../admin_area/product_images" ."/". $new_p_image2;

            if (file_exists($file)) {
                unlink($file);
            }
        }

        if (empty($product_img3)) {
            $product_img3 = $new_p_image3;
        } else {
            $file="../admin_area/product_images" ."/". $new_p_image3;

            if (file_exists($file)) {
                unlink($file);
            }
        }


        move_uploaded_file($temp_name1, "../admin_area/product_images/$product_img1");
        move_uploaded_file($temp_name2, "../admin_area/product_images/$product_img2");
        move_uploaded_file($temp_name3, "../admin_area/product_images/$product_img3");

        $update_product = "update products set cat_id='$cat',date=NOW(),product_title='$product_title',product_url='$product_url',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_kolicina='$product_kolicina',product_desc='$product_desc',product_features='$product_features',product_video='$product_video',product_keywords='$product_keywords',product_label='$product_label',status='$status',product_lokacija='$product_lokacija',product_od='$product_od',product_do='$product_do' where product_id='$p_id'";

        $run_product = mysqli_query($con, $update_product);

        if ($run_product) {
            echo "<script> alert('Pozicija je ažurirana') </script>";

            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
    }

    ?>

<?php } ?>
