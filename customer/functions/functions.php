<?php

$db = mysqli_connect("localhost", "admin", "admin", "nvs_nvs");



function escape($string)
{

    global $db;

    $str = mysqli_real_escape_string($db, trim($string));

    $string = str_replace(array('\r', '\n',"'",'"'), array(chr(13), chr(10),Chr(32),Chr(32)), $str);
 
    return $string;
}

/// IP address code starts /////

function getRealUserIp()
{
    switch (true) {
        case (!empty($_SERVER['HTTP_X_REAL_IP'])):
            return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])):
            return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default:
            return $_SERVER['REMOTE_ADDR'];
    }
}

/// IP address code Ends /////

// items function Starts ///

function items(&$email)
{

    global $db;
    
    $get_id="select * from volunteers where customer_email='$email'";
    $run_id = mysqli_query($db, $get_id);
    
    while ($row_cat=mysqli_fetch_array($run_id)) {
        $cat_id = $row_cat['customer_id'];
    }
    
    $get_items = "select * from wishlist where customer_id='$cat_id'";

    $run_items = mysqli_query($db, $get_items);

    $count_items = mysqli_num_rows($run_items);

    echo $count_items;
}

// items function Ends ///



function getPro()
{

    global $db;

    $get_products = "select * from products order by 1 DESC LIMIT 0,8";

    $run_products = mysqli_query($db, $get_products);

    while ($row_products=mysqli_fetch_array($run_products)) {
        $pro_id = $row_products['product_id'];

        $pro_title = $row_products['product_title'];



        $pro_img1 = $row_products['product_img1'];

        echo "

<div class='col-md-4 col-sm-6 single' >

<div class='product' >

    <a href='details.php?pro_id=$pro_id' ><img src='admin_area/product_images/$pro_img1' class='img-responsive' ></a>

    <div class='text' >

        <h3><a href='details.php?pro_id=$pro_id' >$pro_title</a></h3>

        <p class='buttons' >

            <a href='details.php?pro_id=$pro_id' class='btn btn-default' >Detaljno</a>

            <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Prijavi se </a>

        </p>

    </div>

</div>

</div>

";
    }
}
