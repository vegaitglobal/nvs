<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts  --->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / Prijave

</li>

</ol><!-- breadcrumb Ends  --->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

    <div class="panel-heading"><!-- panel-heading Starts -->

        <h3 class="panel-title"><!-- panel-title Starts -->

        <i class="fa fa-money fa-fw"></i> Prijave

        </h3><!-- panel-title Ends -->

    </div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->
    <div class="row">
    <div class="col-md-3">
        <form class="form-inline" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

        <div class="form-group" ><!-- form-group Starts -->

        <label class="control-label" > Oblast </label>
    

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

     

        </div><!-- form-group Ends -->
        <div class="form-group" ><!-- form-group Starts -->

            <label class="control-label" ></label>

            <input type="submit" name="sortiraj" value="Sortiraj" class="btn btn-primary form-control" >
  

        </div><!-- form-group Ends -->

    </form><!-- form-horizontal Ends -->
    </div>   
        
    <div class="col-md-7">
        <form class="form-inline" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

        <div class="form-group" ><!-- form-group Starts -->

            <label class="control-label" > \</label>

        

            <select name="pro" class="form-control" >

            <option> izaberi poziciju </option>

            <?php

            $get_pro = "SELECT * FROM products WHERE status='active' ";

            $run_pro = mysqli_query($con,$get_pro);

            while ($row_pro=mysqli_fetch_array($run_pro)) {

                $pro_id = $row_pro['product_id'];

                $pro_title = $row_pro['product_title'];

            echo "<option value='$pro_id'>$pro_title</option>";

            }

            ?>

            </select>

        

        </div><!-- form-group Ends -->
        
        <div class="form-group" ><!-- form-group Starts -->

            <label class="control-label" ></label>

            <input type="submit" name="pozicija" value="Sortiraj" class="btn btn-primary form-control" >

        </div>

        <!-- form-group Ends -->

        </form><!-- form-horizontal Ends -->
</div>
<div class="col-md-2">
     <button class="btn btn-success">Export u Excel</button>
</div>
</div> 
<br>

<div class="table-responsive"><!-- table-responsive Starts -->

<table id="table2excel"  class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>No:</th>
<th>Ime:</th>
<th>Email:</th>
<th>Telefon:</th>
<th>Pozicija:</th>
<th>Datum:</th>
<th>Status:</th>
<th class="noExl">Odobri:</th>
<th class="noExl">Odbij:</th>
<th class="noExl">Briši:</th>


</tr>

</thead><!-- thead Ends -->


<tbody><!-- tbody Starts -->

<?php
    
    

  if(!isset($_POST['sortiraj']) & !isset($_POST['pozicija'])){
    
    $i = 0;


    $get_orders = "select * from wishlist order by datum DESC ";

    $run_orders = mysqli_query($con,$get_orders);

    while ($row_orders = mysqli_fetch_array($run_orders)) {

        $order_id = $row_orders['wishlist_id'];

        $c_id = $row_orders['customer_id'];

        $product_id = $row_orders['product_id'];

        $order_date = $row_orders['datum'];

        $order_status = $row_orders['status'];

        $get_products = "select * from products where product_id='$product_id'";

        $run_products = mysqli_query($con,$get_products);

        $row_products = mysqli_fetch_array($run_products);

        $product_title = $row_products['product_title'];

        $i++;

        ?>

        <tr>

        <td><?php echo $i; ?></td>

        <td>
        <?php 

            $get_customer = "select * from volunteers where customer_id='$c_id'";

            $run_customer = mysqli_query($con,$get_customer);

            $row_customer = mysqli_fetch_array($run_customer);
        
            $customer_name = $row_customer['customer_name'];

            $customer_email = $row_customer['customer_email'];
        
            $customer_contact = $row_customer['customer_contact'];

            echo $customer_name;

         ?>
         </td>

       <td>
        <?php
         echo $customer_email;
        /*
            $get_manufacturerid = "select * from products where product_id='$product_id'";

            $run_manufacturerid = mysqli_query($con,$get_manufacturerid);

            $row_manfacturerid = mysqli_fetch_array($run_manufacturerid);

            $manufacturer_id = $row_manfacturerid['manufacturer_id'];

            $get_manufacturer = "select * from organizations where manufacturer_id='$manufacturer_id'";

            $run_manufacturer = mysqli_query($con,$get_manufacturer);

            $row_manfacturer = mysqli_fetch_array($run_manufacturer);

            $manufacturer_title = $row_manfacturer['manufacturer_title'];

            echo $manufacturer_title;
         */
        ?>
    </td>

    <td>
        <?php
             echo $customer_contact;
            /*

            $get_p_catid = "select * from products where product_id='$product_id'";

            $run_p_catid = mysqli_query($con,$get_p_catid);

            $row_p_catid = mysqli_fetch_array($run_p_catid);

            $p_catid_id = $row_p_catid['p_cat_id'];

            $get_p_cat = "select * from product_categories where p_cat_id='$p_catid_id'";

            $run_p_cat = mysqli_query($con,$get_p_cat);

            $row_p_cat = mysqli_fetch_array($run_p_cat);

            $p_cat_title = $row_p_cat['p_cat_title'];

            echo $p_cat_title;
            */
        ?>
     </td>        
        

        <td><?php echo $product_title; ?></td>

        <td>
        <?php echo $order_date;   ?>
        </td>


        <td>
        <?php  echo $order_status; ?>
        </td>
     <?php
        echo "<td class='noExl' ><a href='index.php?view_orders&approve=$order_id'>Prihvati</a></td>";
        echo "<td class='noExl' ><a href='index.php?view_orders&unapprove=$order_id'>Odbij</a></td>";

      ?> 
        <td class='noExl' >

            <a href="index.php?order_delete=<?php echo $order_id; ?>" >

            <i class="fa fa-trash-o" ></i> Delete

            </a>

        </td>


        </tr>


<?php } }
    
    
if(isset($_POST['sortiraj'])){
    
    $i = 0;
    
    $the_cat_id = $_POST['cat'];
    
    $query = "select * from products where cat_id= '$the_cat_id' ";
    
    $run_query = mysqli_query($con,$query);

    while($row_query = mysqli_fetch_array($run_query)){

        $product_id = $row_query['product_id'];

        $product_title = $row_query['product_title'];
            
         $get_orders = "select * from wishlist where product_id = '$product_id' order by datum DESC ";

        $run_orders = mysqli_query($con,$get_orders);

        while ($row_orders = mysqli_fetch_array($run_orders)) {

            $order_id = $row_orders['wishlist_id'];

            $c_id = $row_orders['customer_id'];

            $product_id = $row_orders['product_id'];

            $order_date = $row_orders['datum'];

            $order_status = $row_orders['status'];

            $get_products = "select * from products where product_id='$product_id'";

            $run_products = mysqli_query($con,$get_products);

            $row_products = mysqli_fetch_array($run_products);

            $product_title = $row_products['product_title'];

            $i++;

            ?>

            <tr>

            <td><?php echo $i; ?></td>

            <td>
            <?php 

                $get_customer = "select * from volunteers where customer_id='$c_id'";

                $run_customer = mysqli_query($con,$get_customer);

                $row_customer = mysqli_fetch_array($run_customer);

                $customer_name = $row_customer['customer_name'];

                $customer_email = $row_customer['customer_email'];

                $customer_contact = $row_customer['customer_contact'];

                echo $customer_name;

             ?>
             </td>


           <td>
            <?php
                 echo $customer_email;
            /*
                $get_manufacturerid = "select * from products where product_id='$product_id'";

                $run_manufacturerid = mysqli_query($con,$get_manufacturerid);

                $row_manfacturerid = mysqli_fetch_array($run_manufacturerid);

                $manufacturer_id = $row_manfacturerid['manufacturer_id'];

                $get_manufacturer = "select * from organizations where manufacturer_id='$manufacturer_id'";

                $run_manufacturer = mysqli_query($con,$get_manufacturer);

                $row_manfacturer = mysqli_fetch_array($run_manufacturer);

                $manufacturer_title = $row_manfacturer['manufacturer_title'];

                echo $manufacturer_title;
            */
            ?>
        </td>

        <td>
            <?php
                echo $customer_contact;
                /*

                $get_p_catid = "select * from products where product_id='$product_id'";

                $run_p_catid = mysqli_query($con,$get_p_catid);

                $row_p_catid = mysqli_fetch_array($run_p_catid);

                $p_catid_id = $row_p_catid['p_cat_id'];

                $get_p_cat = "select * from product_categories where p_cat_id='$p_catid_id'";

                $run_p_cat = mysqli_query($con,$get_p_cat);

                $row_p_cat = mysqli_fetch_array($run_p_cat);

                $p_cat_title = $row_p_cat['p_cat_title'];

                echo $p_cat_title;
                */
            ?>
         </td>
            
            <td><?php echo $product_title; ?></td>

            <td>
            <?php echo $order_date;   ?>
            </td>


            <td>
            <?php  echo $order_status; ?>
            </td>
         <?php
            echo "<td class='noExl'><a href='index.php?view_orders&approve=$order_id'>Prihvati</a></td>";
            echo "<td class='noExl'><a href='index.php?view_orders&unapprove=$order_id'>Odbij</a></td>";

          ?> 
            <td class='noExl'>

                <a href="index.php?order_delete=<?php echo $order_id; ?>" >

                <i class="fa fa-trash-o" ></i> Delete

                </a>

            </td>


            </tr>

 <?php      
        }}
      
    
}
    
    

 if(isset($_POST['pozicija'])){
    
    $i = 0;
    
    $the_pro_id = $_POST['pro'];
    
    $get_poz = "select * from wishlist where product_id= '$the_pro_id' order by datum DESC ";

    $run_poz = mysqli_query($con,$get_poz);

    while ($row_poz = mysqli_fetch_array($run_poz)) {

        $order_id = $row_poz['wishlist_id'];

        $c_id = $row_poz['customer_id'];

        $order_date = $row_poz['datum'];

        $order_status = $row_poz['status'];

        $get_products = "select * from products where product_id='$the_pro_id'";

        $run_products = mysqli_query($con,$get_products);

        $row_products = mysqli_fetch_array($run_products);

        $product_title = $row_products['product_title'];

        $i++;

        ?>

        <tr>

        <td><?php echo $i; ?></td>

        <td>
        <?php 

            $get_customer = "select * from volunteers where customer_id='$c_id'";

            $run_customer = mysqli_query($con,$get_customer);

            $row_customer = mysqli_fetch_array($run_customer);

            $customer_name = $row_customer['customer_name'];

            $customer_email = $row_customer['customer_email'];

            $customer_contact = $row_customer['customer_contact'];

            echo $customer_name;


         ?>
         </td>



       <td>
        <?php
             echo $customer_email;
            /*
            $get_manufacturerid = "select * from products where product_id='$the_pro_id'";

            $run_manufacturerid = mysqli_query($con,$get_manufacturerid);

            $row_manfacturerid = mysqli_fetch_array($run_manufacturerid);

            $manufacturer_id = $row_manfacturerid['manufacturer_id'];

            $get_manufacturer = "select * from organizations where manufacturer_id='$manufacturer_id'";

            $run_manufacturer = mysqli_query($con,$get_manufacturer);

            $row_manfacturer = mysqli_fetch_array($run_manufacturer);

            $manufacturer_title = $row_manfacturer['manufacturer_title'];

            echo $manufacturer_title;
            */

        ?>
    </td>

    <td>
        <?php
             echo $customer_contact;

            /*
            $get_p_catid = "select * from products where product_id='$the_pro_id'";

            $run_p_catid = mysqli_query($con,$get_p_catid);

            $row_p_catid = mysqli_fetch_array($run_p_catid);

            $p_catid_id = $row_p_catid['p_cat_id'];

            $get_p_cat = "select * from product_categories where p_cat_id='$p_catid_id'";

            $run_p_cat = mysqli_query($con,$get_p_cat);

            $row_p_cat = mysqli_fetch_array($run_p_cat);

            $p_cat_title = $row_p_cat['p_cat_title'];

            echo $p_cat_title;
            */
        ?>
     </td>
        
       <td><?php echo $product_title; ?></td>

        <td>
        <?php echo $order_date;   ?>
        </td>


        <td>
        <?php  echo $order_status; ?>
        </td>
     <?php
        echo "<td class='noExl'><a href='index.php?view_orders&approve=$order_id'>Prihvati</a></td>";
        echo "<td class='noExl'><a href='index.php?view_orders&unapprove=$order_id'>Odbij</a></td>";

      ?> 
        <td class='noExl'>

            <a href="index.php?order_delete=<?php echo $order_id; ?>" >

            <i class="fa fa-trash-o" ></i> Delete

            </a>

        </td>


        </tr>
 <?php      
        }}


      
    
 ?>

</tbody><!-- tbody Ends -->

</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php } 

if(isset($_GET['approve'])){
    
    $the_comment_id = $_GET['approve'];
    
    $query = "UPDATE wishlist SET status = 'Prihvaćen' WHERE wishlist_id = $the_comment_id   ";
    $approve_comment_query = mysqli_query($con, $query);
    echo "<script>window.open('index.php?view_orders','_self')</script>";
    
    
}



if(isset($_GET['unapprove'])){
    
    $the_comment_id = $_GET['unapprove'];
    
    $query = "UPDATE wishlist SET status = 'Odbijen' WHERE wishlist_id = $the_comment_id ";
    $unapprove_comment_query = mysqli_query($con, $query);
   echo "<script>window.open('index.php?view_orders','_self')</script>";
    
    
}

?>
<script>
    $("button").click(function(){
			$(function() {
				$("#table2excel").table2excel({
					exclude: ".noExl",
					name: "Excel Document Name",
					filename: "Prijave",
					fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
				});
			});
    });
		</script>
