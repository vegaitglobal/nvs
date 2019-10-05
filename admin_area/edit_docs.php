<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    if (isset($_GET['edit_docs'])) {
        $edit_id = $_GET['edit_docs'];

        $get_d = "select * from docs where docs_id='$edit_id'";

        $run_edit = mysqli_query($con, $get_d);

        $row_edit = mysqli_fetch_array($run_edit);

        $d_id = $row_edit['docs_id'];

        $d_title = $row_edit['docs_title'];

        $d_doc = $row_edit['docs_doc'];

        $new_d_doc = $row_edit['docs_doc'];
    }

    ?>

<div class="row"><!-- row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <ol class="breadcrumb"><!-- breadcrumb Starts -->

            <li class="active">

                <i class="fa fa-dashboard"> </i> Dashboard / Promena dokumenata

            </li>

        </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

    <h3 class="panel-title">

        <i class="fa fa-money fa-fw"></i> Ažuriranje dokumenta

    </h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

    <div class="form-group" ><!-- form-group Starts -->

        <label class="col-md-3 control-label" > Naziv </label>

        <div class="col-md-6" >

            <input type="text" name="docs_title" class="form-control" required value="<?php echo $d_title; ?>">

        </div>

    </div><!-- form-group Ends -->



    <div class="form-group" ><!-- form-group Starts -->

        <label class="col-md-3 control-label" > Dokument </label>

        <div class="col-md-6" >

            <input type="file" name="docs_doc" class="form-control" >
            <br><a  href="<?php if (!empty($d_doc)) {
                echo "../docs/".$d_doc;
                          } ?>">
               <?php echo $d_doc; ?> </a>

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
        $docs_title = $_POST['docs_title'];

        $docs_doc = $_FILES['docs_doc']['name'];

        $temp_name1 = $_FILES['docs_doc']['tmp_name'];

        if (empty($docs_doc)) {
            $docs_doc = $new_d_doc;
        } else {
             $file="../docs" ."/". $new_d_doc;

            if (file_exists($file)) {
                unlink($file);
            }
        }

   
        $update_docs = "update docs set docs_title='$docs_title',docs_doc='$docs_doc' where docs_id='$d_id'";

        $run_product = mysqli_query($con, $update_docs);

        if ($run_product) {
             move_uploaded_file($temp_name1, "../docs/$docs_doc");

               echo "<script>window.open('index.php?view_docs','_self')</script>";
        }
    }
} ?>
