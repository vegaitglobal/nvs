

<div class="panel-heading">
    <h1>Da li zaista želite da izbrišete nalog!</h1>
</div>
<div class="panel-body">
    <div class="container-fluid">
    <form action="" method="post">

        <input class="btn btn-danger" type="submit" name="yes" value="Da, želim da izbrišem nalog">

        <input class="btn btn-success" type="submit" name="no" value="Ne, ne želim da izbrišem nalog">

    </form>
</div>
</div>

<?php

$c_email = $_SESSION['customer_email'];

if (isset($_POST['yes'])) {
     $select_customer = "select * from volunteers where customer_email='$c_email'";
     $run_select = mysqli_query($con, $select_customer);
     $row = mysqli_fetch_array($run_select);
            
            $delete_id = $row["customer_id"];
            $image1= $row["customer_image"];
            $file="customer_images" ."/". $image1;
            
    $delete_wishlist = "delete from wishlist where wishlist_id='$delete_id'";

    $delete_customer = "delete from volunteers where customer_email='$c_email'";

    $run_delete = mysqli_query($con, $delete_customer);

    if ($run_delete) {
        $run_delete_wishlist = mysqli_query($con, $delete_wishlist);
        
        if (file_exists($file)) {
                unlink($file);
        }

        session_destroy();

        echo "<script>alert('Vaš nalog je izbrisan. Doviđenja')</script>";

        echo "<script>window.open('../index.php','_self')</script>";
    }
}

if (isset($_POST['no'])) {
    echo "<script>window.open('index.php?my_wishlist','_self')</script>";
}


?>
