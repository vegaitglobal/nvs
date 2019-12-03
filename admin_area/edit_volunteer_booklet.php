<?php


if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>




    <?php

    $get_volunteer_booklet = "select * from volunteer_booklet";

    $run_volunteer_booklet = mysqli_query($con, $get_volunteer_booklet);

    $row_volunteer_booklet = mysqli_fetch_array($run_volunteer_booklet);

    $desc = $row_volunteer_booklet['short_desc'];
    $pdf_text = $row_volunteer_booklet['pdf_text'];

    ?>

    <div class="row" ><!-- 1 row Starts -->

        <div class="col-lg-12" ><!-- col-lg-12 Starts -->

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard" ></i> Dashboard / Uredi Volontersku knjižicu

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->

    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <div class="panel panel-default"><!-- panel panel-default Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <h3 class="panel-title">

                        <i class="fa fa-money fa-fw"></i> Uredi Volontersku knjižicu

                    </h3>

                </div><!-- panel-heading Ends -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <form method="post" class="form-horizontal"><!-- form-horizontal Starts -->


                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> Kratak opis : </label>

                            <div class="col-md-8">

                                <textarea name="short_desc" class="form-control" rows="4" cols="3">
                                    <?php echo $desc; ?>
                                </textarea>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> PDF Tekst : </label>

                            <div class="col-md-8">

                                <textarea name="pdf_text" id="about_desc" class="form-control" rows="10">

                                    <?php echo $pdf_text; ?>

                                </textarea>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group"><!-- form-group Starts -->

                            <label class="col-md-3 control-label"> </label>

                            <div class="col-md-8">

                                <input type="submit" name="submit" value="Ažuriraj" class="btn btn-primary form-control">

                            </div>

                        </div><!-- form-group Ends -->


                    </form><!-- form-horizontal Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel panel-default Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends -->

    <?php

    if (isset($_POST['submit'])) {

        $desc = escape($_POST['short_desc']);
        $pdf_text = $_POST['pdf_text'];

        $update_volunteer_booklet = "update volunteer_booklet set short_desc='$desc',pdf_text='$pdf_text'";

        $run_volunteer_booklet = mysqli_query($con, $update_volunteer_booklet);

        if ($run_volunteer_booklet) {
            echo "<script>alert('Volonterska knjižica je ažurirana')</script>";

            echo "<script>window.open('index.php?path=edit_volunteer_booklet','_self')</script>";
        }
    }

    ?>


<?php } ?>