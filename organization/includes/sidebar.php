<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

    <?php

    $customer_session = $_SESSION['manufacturer_email'];

    $get_customer = "select * from organizations where manufacturer_email='$customer_session'";

    $run_customer = mysqli_query($con,$get_customer);

    $row_customer = mysqli_fetch_array($run_customer);

    $customer_image = $row_customer['manufacturer_image'];
    

    if($customer_image==""){

        $customer_image="slika.jpg";
    }

    $manufacturer_title_full = $row_customer['manufacturer_title_full'];

    if(!isset($_SESSION['manufacturer_email'])){

    } else {

        echo "

        <center>
            <img src='../admin_area/other_images/$customer_image' class='img-responsive'>
        </center>

        <br>

        <h3 align='center' class='panel-title'> $manufacturer_title_full </h3>

        ";

    }

    ?>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

    <ul class="nav nav-pills nav-stacked"><!-- nav nav-pills nav-stacked Starts -->

              <li class="<?php if(isset($_GET['view_p_cats']) or isset($_GET['insert_p_cat']) ){ echo "active"; } ?>">
       
                    <a href="#" data-toggle="collapse" data-target="#p_cat">

                        <i class="fa fa-fw fa-pencil"></i> Programi

                        <i class="fa fa-fw fa-caret-down"></i>

                    </a>

                    <ul id="p_cat" class="collapse">

                                                
                        <li>
                            <a href="index.php?insert_p_cat"> Unos programa </a>
                        </li>

                        <li>
                            <a href="index.php?view_p_cats"> Pregled programa </a>
                        </li>

                    </ul>

                </li>
                
             <li class="<?php if(isset($_GET['view_products']) or isset($_GET['insert_product']) ){ echo "active"; } ?>">
 
                    <a  href="#" data-toggle="collapse" data-target="#products">

                        <i class="fa fa-fw fa-table"></i> Pozicije

                        <i class="fa fa-fw fa-caret-down"></i>

                    </a>

                    <ul id="products" class="collapse">
                        
                        <li>
                            <a href="index.php?insert_product"> Unos pozicije </a>
                        </li>

                        <li>
                            <a href="index.php?view_products"> Pregled pozicije </a>
                        </li>


                    </ul>

                </li>
                <!-- Products li Ends -->

            
      
        <li class="<?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">

            <a href="index.php?edit_account"> <i class="fa fa-pencil"></i> Uredi nalog </a>

        </li>

        <li class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">

            <a href="index.php?change_pass"> <i class="fa fa-user"></i> Promeni lozinku </a>

        </li>



        <li class="<?php if(isset($_GET['delete_account'])){ echo "active"; } ?>">

            <a href="index.php?delete_account"> <i class="fa fa-trash-o"></i> Izbriši nalog </a>

        </li>

        <li>

            <a href="logout.php"> <i class="fa fa-sign-out"></i> Odjava </a>

        </li>


    </ul><!-- nav nav-pills nav-stacked Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default sidebar-menu Ends -->