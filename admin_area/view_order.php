<?php 

$filter = '';  

if($_SERVER['REQUEST_METHOD'] == "GET") {
    if(isset($_GET['req']) && !empty($_GET['req'])){
        if($_GET['req'] === 'name')
                $filter = " ORDER BY customer_name ASC";  
        } else if ($_GET['req'] === 'email') {
            $fileter = "ORDER BY customer_email ASC";
        } else if ($_GET['req'] === 'telephone') {
            $filter = "ORDER BY customer_contact ASC"; 
        } else if ($_GET['req'] === 'product_title') {
            $filter = "ORDER BY product_title ASC"; 
        } else if($_GET['req'] === 'date') {
            $filter = "OREDER BY datum ASC"; 
        } else if ($_GET['req'] === 'hours') {
            $filter = "ORDER BY hours ASC"; 
        } else if ($_GET['req'] === 'status') {
            $filter = "OREDER BY status ASC";
        }
    }

function status($data, $id) {
    if($data === 1) {
        return "Prihvaćen"; 
    } else if ($data === 0){
        return "Odbijen"; 
    } else {
        return "<div class='btn-group'><a href='#' type='submit' class='btn btn-success btn-sm'>Da</a><a href='#' type='submit' class='btn btn-danger btn-sm'>Ne</a></div>";
    }
}

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}

$get_pro = "SELECT wishlist.wishlist_id, wishlist.customer_id, wishlist.product_id, wishlist.status, wishlist.datum, wishlist.hours, wishlist.hours_approved,
                    volunteers.customer_name, volunteers.customer_email, volunteers.customer_contact, products.product_title
                    FROM wishlist 
                    LEFT JOIN volunteers ON volunteers.customer_id = wishlist.customer_id 
                    LEFT JOIN products ON products.product_id = wishlist.product_id ".$filter;

$run_orders = mysqli_query($con, $get_pro);

//var_dump($con); exit;
?>

<div class="row">
    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <ol class="breadcrumb"><!-- breadcrumb Starts  --->

            <li class="active">

                <i class="fa fa-dashboard"></i> Dashboard / Prijave

            </li>

        </ol><!-- breadcrumb Ends  --->

    </div><!-- col-lg-12 Ends -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i>
                    Prijave
                </h3>
            </div>
            <div class="panel-body">
                <div class="row">

                </div>

                <div class="table-responsive">
                    <table id="table2excel" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No:</th>
                                <th><a href="index.php?path=view_order&req=name">Ime:</a></th>
                                <th><a href="index.php?path=view_order&req=email">Email:</a></th>
                                <th><a href="index.php?path=view_order&req=telephone">Telefon:</a></th>
                                <th><a href="index.php?path=view_order&req=product_title">Pozicija:</a></th>
                                <th><a href="index.php?path=view_order&req=date">Datum:</a></th>
                                <th><a href="index.php?path=view_order&req=hours">Sati:</a></th>
                                <th><a href="index.php?path=view_order&req=status">Status:</a></th>
                                <th>Briši:</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                $i = 0; 
                                while ($row_orders = mysqli_fetch_array($run_orders)) {
                                    $i++; 
                                    echo "<tr>"; 
                                    echo "<td>".$i."</td>";
                                    echo "<td>".$row_orders['customer_name']."</td>"; 
                                    echo "<td>".$row_orders['customer_email']."</td>"; 
                                    echo "<td>".$row_orders['customer_contact']."</td>";
                                    echo "<td>".$row_orders['product_title']."</td>"; 
                                    echo "<td>".$row_orders['datum']."</td>";
                                    echo "<td><a href='index.php?path=edit_hours&id=".$row_orders['wishlist_id']."'>".$row_orders['hours']."</a></td>";
                                    echo "<td>".status($row_orders['status'], $row_orders['wishlist_id'])."</td>";
                                    echo "<td><a href='index.php?path=order_delete&id=".$row_orders['wishlist_id']."'><i class='fa fa-trash-o'></i> Delete</a></td>";
                                    echo "</tr>"; 
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
