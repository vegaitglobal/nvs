<?php

require_once __DIR__.'/../app/config.php';

$dbParams = config('doctrine_db');

$db = mysqli_connect("localhost", $dbParams['user'], $dbParams['password'], $dbParams['dbname']);

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


// getPro function Starts //

function getPro()
{

    global $db;

    $get_products = "select * from products where status='active' order by 1 DESC LIMIT 0,8";

    $run_products = mysqli_query($db, $get_products);

    while ($row_products=mysqli_fetch_array($run_products)) {
        $pro_id = $row_products['product_id'];

        $pro_title = $row_products['product_title'];

        $pro_kolicina = $row_products['product_kolicina'];


        $pro_img1 = $row_products['product_img1'];

        $pro_label = $row_products['product_label'];

        $manufacturer_id = $row_products['manufacturer_id'];

        $get_manufacturer = "select * from organizations where manufacturer_id='$manufacturer_id'";

        $run_manufacturer = mysqli_query($db, $get_manufacturer);

        $row_manufacturer = mysqli_fetch_array($run_manufacturer);

        $manufacturer_name = $row_manufacturer['manufacturer_title'];

    

        $pro_url = $row_products['product_url'];



        if ($pro_label == "") {
            $product_label="";
        } else {
            $product_label = "

        <a class='label sale' href='#' style='color:black;'>

        <div class='thelabel'>$pro_label</div>

        <div class='label-background'> </div>

        </a>

        ";
        }


        echo "

    <div class='col-md-4 col-sm-6 single'>

        <div class='product'>

            <a href='$pro_url' ><img src='admin_area/product_images/$pro_img1' class='img-responsive' ></a>

            <div class='text'>

                <center>

                    <p class='btn btn-primary'> $manufacturer_name </p>

                </center>

                <hr>

                <h3><a href='$pro_url' >$pro_title</a></h3>

                <p class='price'>  $pro_kolicina volontera </p>

                <p class='buttons'>

                    <a href='$pro_url' class='btn btn-default' >Detaljno</a>

                    <a href='$pro_url' class='btn btn-primary'></i> Prijavi se </a>

                </p>

            </div>

            $product_label

        </div>

    </div>

    ";
    }
}

// getPro function Ends //


/// getProducts Function Starts ///

function getProducts()
{

/// getProducts function Code Starts ///

    global $db;

    $aWhere = array();

/// organizations Code Starts ///

    if (isset($_REQUEST['man'])&&is_array($_REQUEST['man'])) {
        foreach ($_REQUEST['man'] as $sKey => $sVal) {
            if ((int)$sVal!=0) {
                $aWhere[] = 'manufacturer_id='.(int)$sVal;
            }
        }
    }

/// organizations Code Ends ///

/// Products Categories Code Starts ///

// if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){
//    foreach($_REQUEST['p_cat'] as $sKey=>$sVal){
//       if((int)$sVal!=0){
//            $aWhere[] = 'p_cat_id='.(int)$sVal;
//        }
//    }
// }

/// Products Categories Code Ends ///

/// Categories Code Starts ///

    if (isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])) {
        foreach ($_REQUEST['cat'] as $sKey => $sVal) {
            if ((int)$sVal!=0) {
                $aWhere[] = 'cat_id='.(int)$sVal;
            }
        }
    }

/// Categories Code Ends ///

    $per_page=2;

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page=1;
    }

    $start_from = ($page-1) * $per_page ;

    $sLimit = " order by 1 DESC LIMIT $start_from, $per_page";
    
//$sWhere = (count($aWhere)>0?" WHERE status='active' and ".implode(' or ',$aWhere):" WHERE status='active' ").$sLimit;
    
//$get_products = "select * from products  ".$sWhere;
 
    $sWhere = (count($aWhere)>0?' AND ('.implode(' or ', $aWhere).')':' ').$sLimit;
    
    $get_products = "select * from products WHERE status='active' ".$sWhere;

    $run_products = mysqli_query($db, $get_products);

    while ($row_products=mysqli_fetch_array($run_products)) {
        $pro_id = $row_products['product_id'];

        $pro_title = $row_products['product_title'];

        $pro_kolicina = $row_products['product_kolicina'];

        $pro_img1 = $row_products['product_img1'];

        $pro_label = $row_products['product_label'];
    
        $pro_od = date("d.m.Y", strtotime($row_products['product_od']));
       
        $pro_do = date("d.m.Y", strtotime($row_products['product_do']));

        $manufacturer_id = $row_products['manufacturer_id'];

        $get_manufacturer = "select * from organizations where manufacturer_id='$manufacturer_id'";

        $run_manufacturer = mysqli_query($db, $get_manufacturer);

        $row_manufacturer = mysqli_fetch_array($run_manufacturer);

        $manufacturer_name = $row_manufacturer['manufacturer_title'];

        $pro_url = $row_products['product_url'];


        if ($pro_label == "") {
            $product_label = "";
        } else {
            $product_label = "

        <a class='label sale' href='#' style='color:black;'>

        <div class='thelabel'>$pro_label</div>

        <div class='label-background'> </div>

        </a>

        ";
        }


        echo "

    <div class='col-md-6 col-sm-6'>

        <div class='product'>
        	<div class='placeholder'>
            	<a href='ponuda-$pro_url' ><img src='admin_area/product_images/$pro_img1' class='img-responsive  center-block' > </a>
            </div>
            <div class='text' >
            
                <center>

                    <p class='btn btn-primary'> $manufacturer_name </p>

                </center>

                <hr>

                 <p class='price' > $pro_od - $pro_do </p>
                 
                 <hr>
                <h3><a href='ponuda-$pro_url' >$pro_title</a></h3>

                 <p class='price' > $pro_kolicina volontera </p> 

                <p class='buttons' >

                    <a href='ponuda-$pro_url' class='btn btn-default' >Detalji</a>

                    <a href='ponuda-$pro_url' class='btn btn-primary'></i> Prijavi se  </a>

                </p>

            </div>

            $product_label

        </div>

    </div>

    ";
    }
/// getProducts function Code Ends ///
}


/// getBlogs Function Ends ///


/// getBlogs Function Starts ///

function getBlogs()
{

/// getBlogs function Code Starts ///

    global $db;

    $aWhere = array();

    

    /// Products Categories Code Starts ///

    if (isset($_REQUEST['p_tag'])&&is_array($_REQUEST['p_tag'])) {
        foreach ($_REQUEST['p_tag'] as $sKey => $sVal) {
            if ($sVal!="") {
                $aWhere[] = "post_tags='".$sVal. "'";
            }
        }
    }

    /// Products Categories Code Ends ///

    /// Categories Code Starts ///

    if (isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])) {
        foreach ($_REQUEST['cat'] as $sKey => $sVal) {
            if ((int)$sVal!=0) {
                $aWhere[] = 'post_cat_id=' . $sVal;
            }
        }
    }

    /// Categories Code Ends ///

    $per_page=3;

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page=1;
    }

    $start_from = ($page-1) * $per_page ;

    $sLimit = " order by post_date DESC LIMIT $start_from,$per_page";

    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ', $aWhere):'').$sLimit;

    $get_products = "select * from posts  ".$sWhere;

    $run_products = mysqli_query($db, $get_products);
    

    while ($row_products=mysqli_fetch_array($run_products)) {
        $pro_id = $row_products['post_id'];
        
        $pro_url = $row_products['post_url'];

        $pro_title = $row_products['post_title'];

        $pro_img1 = $row_products['post_image'];

        $pro_label = $row_products['post_tags'];

         $pro_user = $row_products['post_user'];
     
        $pro_content = $row_products['post_content'];
        
        $pro_date = $row_products['post_date'];
        
        $pro_cat_id =$row_products['post_cat_id'];
        
        $get_category = "select * from categories where cat_id='$pro_cat_id'";

        $run_category = mysqli_query($db, $get_category);

        $row_category = mysqli_fetch_array($run_category);

        $category_name = $row_category['cat_title'];
        
        if ($pro_label == "") {
            $product_label = "";
        } else {
            $product_label = $pro_label;
        }


        echo "

        <div id='blog-listing-big'>

            <section class='post'>
                <h2><a href='blog-$pro_url'>$pro_title</a></h2>
                <hr style='border-top: 1px solid #F78715;box-shadow: 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(247, 135, 21, 1);'>
                <div class='row'>
                        <div class='col-sm-6'>
                            <p class='author-category'>By <a href='#'>$pro_user</a> in <a href='#'>$pro_label</a></p>
                        </div>
                        <div class='col-sm-6 text-right'>
                            <p class='author-category'><a href='blog-$pro_url'><i class='fa fa-calendar-o'></i> $pro_date</a></p>
                        </div>
                </div>

                <div class='image tocentar'>
                <a href='blog-$pro_url'><img src='admin_area/blogs_images/$pro_img1'  alt='Example blog post alt' class='img-responsive'></a>
                </div>       
                <div>
                $pro_content
                </div>
         
            </section>

        </div>

        ";
    }
    /// getBlogs function Code Ends ///
}


/// getBlogs Function Ends ///



/// getOrgs Function Starts ///

function getOrgs()
{

/// getBlogs function Code Starts ///

    global $db;

    $aWhere = array();

    

     /// Products Categories Code Starts ///
    
   
    if (isset($_REQUEST['m_org'])&&is_array($_REQUEST['m_org'])) {
        foreach ($_REQUEST['m_org'] as $sKey => $sVal) {
            if ($sVal!="") {
                $aWhere[] = "manufacturer_mesto='". $sVal."'";
            }
        }
    }

   
    /// Categories Code Ends ///

    $per_page=3;

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page=1;
    }

    $start_from = ($page-1) * $per_page ;

    $sLimit = " order by manufacturer_title_full DESC LIMIT $start_from,$per_page";

    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ', $aWhere):'').$sLimit;

    $get_products = "select * from organizations  ".$sWhere;

    $run_products = mysqli_query($db, $get_products);

    while ($row_manufacturer=mysqli_fetch_array($run_products)) {
        $m_id = $row_manufacturer['manufacturer_id'];

        $m_title = $row_manufacturer['manufacturer_title'];

        $m_title_full = $row_manufacturer['manufacturer_title_full'];

        $m_top = $row_manufacturer['manufacturer_top'];

        $m_image = $row_manufacturer['manufacturer_image'];

        $m_opis = $row_manufacturer['manufacturer_opis'];

        $m_mesto = $row_manufacturer['manufacturer_mesto'];

        $m_adresa = $row_manufacturer['manufacturer_adresa'];

        $m_tel = $row_manufacturer['manufacturer_tel'];

        $m_email = $row_manufacturer['manufacturer_email'];

        $m_url = $row_manufacturer['manufacturer_url'];
        
        $m_fb = $row_manufacturer['manufacturer_fb'];
      
               
        
        echo "

        <div id='blog-listing-big'>

            <section class='post'>
                <h2><a href='$m_url'>$m_title_full</a></h2>
                <hr style='border-top: 1px solid #F78715;box-shadow: 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(247, 135, 21, 1);'>
                <h3><span style='font-size: 18px; padding-right: 13px;'>adresa:</span><span style='color: #993300;'> $m_mesto, $m_adresa</span></h3>
                 <h4><span style='font-size: 18px; padding-right: 42px;'>web</span>:<a href='$m_url'>$m_url</a></h4>
                 <h4>facebook: <a href='$m_fb'>$m_fb</a></h4>
                 <h4><span style='font-size: 18px; padding-right: 32px;'>email</span>:<a href='mailto:$m_email' target='_top'>$m_email</a></h4>
                 <h4><span style='font-size: 18px; padding-right: 19px;'>telefon</span>:<span style='color: #993300;'>$m_tel</span></h4> 
                <div class='image tocentar'>
                <a href='$m_url'><img src='admin_area/other_images/$m_image'  alt='Example blog post alt' class='img-responsive'></a>
                </div>       
                <div class='post-content'>
                <p>$m_opis</p>
                </div>                
           
            </section>

        </div>

        ";
    }
    /// getBlogs function Code Ends ///
}


/// getBlogs Function Ends ///


/// getPaginator Function Starts ///

function getPaginator()
{

/// getPaginator Function Code Starts ///

    $per_page = 2;

    global $db;

    $aWhere = array();

    $aPath = '';

/// organizations Code Starts ///

    if (isset($_REQUEST['man'])&&is_array($_REQUEST['man'])) {
        foreach ($_REQUEST['man'] as $sKey => $sVal) {
            if ((int)$sVal!=0) {
                $aWhere[] = 'manufacturer_id='.(int)$sVal;

                $aPath .= 'man[]='.(int)$sVal.'&';
            }
        }
    }

/// organizations Code Ends ///

/// Products Categories Code Starts ///

// if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){
//    foreach($_REQUEST['p_cat'] as $sKey=>$sVal){
//        if((int)$sVal!=0){
//            $aWhere[] = 'p_cat_id='.(int)$sVal;
//            $aPath .= 'p_cat[]='.(int)$sVal.'&';
//        }
//    }
// }

/// Products Categories Code Ends ///

/// Categories Code Starts ///

    if (isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])) {
        foreach ($_REQUEST['cat'] as $sKey => $sVal) {
            if ((int)$sVal!=0) {
                $aWhere[] = 'cat_id='.(int)$sVal;

                $aPath .= 'cat[]='.(int)$sVal.'&';
            }
        }
    }

/// Categories Code Ends ///


    $sWhere = (count($aWhere)>0?" WHERE status='active' and (".implode(' or ', $aWhere).")":" WHERE status='active' ");

    $query = "select * from products ".$sWhere;

    $result = mysqli_query($db, $query);

    $total_records = mysqli_num_rows($result);

    $total_pages = ceil($total_records / $per_page);

    echo "<li><a href='shop.php?page=1";

    if (!empty($aPath)) {
        echo "&".$aPath;
    }

    echo "' >".'Prva'."</a></li>";

    for ($i=1; $i<=$total_pages; $i++) {
        echo "<li><a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."' >".$i."</a></li>";
    };

    echo "<li><a href='shop.php?page=$total_pages";

    if (!empty($aPath)) {
        echo "&".$aPath;
    }

    echo "' >".'Zadnja'."</a></li>";

/// getPaginator Function Code Ends ///
}

/// getPaginator Function Ends ///


 


function getPaginatorBlog()
{

/// getPaginator Function Code Starts ///

    $per_page = 3;

    global $db;

    $aWhere = array();

    $aPath = '';

   

    /// Products Categories Code Starts ///

    if (isset($_REQUEST['p_tag'])&&is_array($_REQUEST['p_tag'])) {
        foreach ($_REQUEST['p_tag'] as $sKey => $sVal) {
            if ((int)$sVal!=0) {
                $aWhere[] = 'post_tags='.(int)$sVal;

                $aPath .= 'p_tag[]='.(int)$sVal.'&';
            }
        }
    }

    /// Products Categories Code Ends ///

    /// Categories Code Starts ///

    if (isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])) {
        foreach ($_REQUEST['cat'] as $sKey => $sVal) {
            if ((int)$sVal!=0) {
                $aWhere[] = ' post_cat_id='.(int)$sVal;

                $aPath .= 'cat[]='.(int)$sVal.'&';
            }
        }
    }

    /// Categories Code Ends ///

    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ', $aWhere):'');

    $query = "select * from posts ".$sWhere;

    $result = mysqli_query($db, $query);

    $total_records = mysqli_num_rows($result);

    $total_pages = ceil($total_records / $per_page);

    echo "<li><a href='blog.php?page=1";

    if (!empty($aPath)) {
        echo "&".$aPath;
    }

    echo "' >".'Prva'."</a></li>";

    for ($i=1; $i<=$total_pages; $i++) {
        echo "<li><a href='blog.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."' >".$i."</a></li>";
    };

    echo "<li><a href='blog.php?page=$total_pages";

    if (!empty($aPath)) {
        echo "&".$aPath;
    }

    echo "' >".'Zadnja'."</a></li>";

    /// getPaginator Function Code Ends ///
}

/// getPaginator Function Ends ///

function getPaginatorOrgs()
{

/// getPaginator Function Code Starts ///

    $per_page = 3;

    global $db;

    $aWhere = array();

    $aPath = '';

   

    /// Products Categories Code Starts ///

    if (isset($_REQUEST['m_org'])&&is_array($_REQUEST['m_org'])) {
        foreach ($_REQUEST['m_org'] as $sKey => $sVal) {
            if ((int)$sVal!=0) {
                $aWhere[] = 'manufacturer_mesto='.(int)$sVal;

                $aPath .= 'm_org[]='.(int)$sVal.'&';
            }
        }
    }

    /// Products Categories Code Ends ///

   
    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ', $aWhere):'');

    $query = "select * from organizations ".$sWhere;

    $result = mysqli_query($db, $query);

    $total_records = mysqli_num_rows($result);

    $total_pages = ceil($total_records / $per_page);

    echo "<li><a href='org.php?page=1";

    if (!empty($aPath)) {
        echo "&".$aPath;
    }

    echo "' >".'Prva'."</a></li>";

    for ($i=1; $i<=$total_pages; $i++) {
        echo "<li><a href='org.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."' >".$i."</a></li>";
    };

    echo "<li><a href='org.php?page=$total_pages";

    if (!empty($aPath)) {
        echo "&".$aPath;
    }

    echo "' >".'Zadnja'."</a></li>";

    /// getPaginator Function Code Ends ///
}

/// getPaginator Function Ends ///
