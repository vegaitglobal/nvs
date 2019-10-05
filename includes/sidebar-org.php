<?php


$aPCat = array();



/// Products Categories Code Starts ///

if (isset($_REQUEST['m_org'])&&is_array($_REQUEST['m_org'])) {
    foreach ($_REQUEST['m_org'] as $sKey => $sVal) {
        if ((int)$sVal!=0) {
            $aPCat[(int)$sVal] = (int)$sVal;
        }
    }
}

/// Products Categories Code Ends ///


?>



<div class="panel panel-default sidebar-menu"><!--- panel panel-default sidebar-menu Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

    <h3 class="panel-title"><!-- panel-title Starts -->

        Prijavi se

    </h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->


<div class="panel-body"><!-- panel-body Starts -->

 
    <?php
    if (!isset($_SESSION['manufacturer_email'])) {
        include("organization/customer_login.php");
    } else {
        ?>
             
             <h4>Prijavljeni ste kao <?php echo $_SESSION['manufacturer_email'] ?></h4>

             <a href="organization/logout.php" class="btn btn-primary">Odjava</a>

             <a href="organization/index.php" class="btn btn-primary">Admin</a>

    <?php } ?>
    
 

</div><!-- panel-body Ends -->


</div><!-- panel-collapse collapse-data Ends -->





<div class="panel panel-default sidebar-menu"><!--- panel panel-default sidebar-menu Starts -->

    <div class="panel-heading"><!-- panel-heading Starts -->

        <h3 class="panel-title"><!-- panel-title Starts -->

            Mesta

            <div class="pull-right"><!-- pull-right Starts -->

                <a href="#" style="color:black;">

                <span class="nav-toggle hide-show">  sakrij</span> </a>

            </div><!-- pull-right Ends -->

    </h3><!-- panel-title Ends -->

    </div><!-- panel-heading Ends -->

    <div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Starts -->

    <div class="panel-body"><!-- panel-body Starts -->

        <div class="input-group"><!-- input-group Starts -->

            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-p-cats" placeholder="nađi mesta">

            <a class="input-group-addon"> <i class="fa fa-search"></i> </a>

        </div><!-- input-group Ends -->

    </div><!-- panel-body Ends -->

    <div class="panel-body scroll-menu"><!-- panel-body scroll-menu Starts -->

    <ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cats"><!-- nav nav-pills nav-stacked category-menu Starts -->

    <?php

    $get_orgs = "select DISTINCT manufacturer_mesto from organizations  ";

    $run_orgs = mysqli_query($con, $get_orgs);

    while ($row_orgs = mysqli_fetch_array($run_orgs)) {
        $m_org = $row_orgs['manufacturer_mesto'];
        $m_img="";
        echo "

        <li class='checkbox checkbox-primary'  >

        <a>

            <label>

                <input ";

        if (isset($aPCat[$m_org])) {
            echo "checked='checked'";
        }

                echo " type='checkbox' value='$m_org' name='m_org' class='get_m_org' id='m_org' >

                <span> 
                   $m_img
                    $m_org
                </span>

            </label>

        </a>

        </li>

        ";
    }

    
    ?>

    </ul><!-- nav nav-pills nav-stacked category-menu Ends -->

    </div><!-- panel-body scroll-menu Ends -->

    </div><!-- panel-collapse collapse-data Ends -->

</div><!--- panel panel-default sidebar-menu Ends -->
